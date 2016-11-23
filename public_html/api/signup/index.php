<!--Does not deviate too much from Login API.  -->
<!--Inputs are going to be username, publicKeyX, publicKeyY. Logic is to look up profile by username, compare keys and make sure both keys match, if there is any discrepancy, throw them out. Profile object (including Keys) are going to be in the session. Need to getProfilePublicKeyx, getProfilePublicKeyY-->

<?php

require_once dirname(__DIR__, 3) . "/php/class/autoloader.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");

use Edu\Cnm\KiteCrypt\Profile;


/**
 * API for new user registration**
 *
 * @author Jonathan Guzman <jguzman41@cnm.edu>
 **/

//verify the session, start if not active
if(session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

//prepare an empty reply
$reply = new stdClass();
$reply->status = 200;
$reply->data = null;

$exceptionMessage = "Username or Password invalid";
$exceptionCode = 401;



try {
	//grab the mySQL connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/kitecrypt.ini");

	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	$profileUserName= filter_input(INPUT_POST, "profileUserName", FILTER_SANITIZE_STRING);
	$profilePassword = filter_input(INPUT_POST, "profilePassword", FILTER_SANITIZE_STRING);
	$confirmProfilePassword = filter_input(INPUT_POST, "confirmProfilePassword", FILTER_SANITIZE_STRING);


	if($method === "POST") {

		//set XSRF cookie
//		setXsrfCookie();
//		verifyXsrf();

		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);

		/*-----checking and sanitizing profileUserName, profilePassword--------------*/
		//check that email and password fields are not empty, and sanitize that input

		if(empty($requestObject->profileUserName) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$profileUserName = filter_var($requestObject->profileUserName, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		if(empty($requestObject->profilePassword) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$profilePassword = filter_var($requestObject->profilePassword, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		if(empty($requestObject->profileConfirmPassword) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$profileConfirmPassword = filter_var($requestObject->profileConfirmPassword, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		if($requestObject->profilePassword !== $requestObject->confirmProfilePassword) {
			throw (new InvalidArgumentException("the passwords you provided do not match"));
		}

		//create a new salt and email activation
		$salt = bin2hex(random_bytes(16));

		//Use "SET" methods to create new username/password


		$profileFromDatabase = Profile::getProfileByUserName($pdo, $profileUserName);

		$profileXFromDatabase = $profileFromDatabase->getProfilePublicKeyX();

		$profileYFromDatabase = $profileFromDatabase->getProfilePublicKeyY();

		if($profileXFromDatabase === null || $profileYFromDatabase === null){
			throw( new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		}

		if($profilePublicKeyXFromUser !== $profileXFromDatabase || $profilePublicKeyYFromUser !== $profileYFromDatabase){
			throw( new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		}

//		If all username, public Key x, and public key Y match, send them to the chat page with friends list


	} else {
		throw (new InvalidArgumentException($exceptionMessage, $exceptionCode));
	}

	// update reply with exception information
} catch(Exception $exception) {
	$reply->status = $exception->getCode();
	$reply->message = $exception->getMessage();
} catch(TypeError $typeError) {
	$reply->status = $typeError->getCode();
	$reply->message = $typeError->getMessage();
}

header("Content-type: application/json");
if($reply->data === null) {
	unset($reply->data);
}

// encode and return reply to front end caller
echo json_encode($reply);
