<?php


/**
 * Inputs are going to be username, publicKeyX, publicKeyY. Logic is to look up profile by *  username, compare keys and make sure both keys match, if there is any discrepancy, throw them out. Profile object (including Keys) are going to be in the session. Need to getProfilePublicKeyx, getProfilePublicKeyY
 */

require_once dirname(__DIR__, 3) . "/php/class/autoloader.php";
require_once dirname(__DIR__, 3) . "/php/lib/xsrf.php";
require_once("/etc/apache2/capstone-mysql/encrypted-config.php");

use Edu\Cnm\KiteCrypt\Message;


/**
 * RESTFUL api for the Messages class
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

$exceptionMessage = "no encrypted message for you";
$exceptionCode = 401;



try {
	$config = readConfig("/etc/apache2/capstone-mysql/kitecrypt.ini");
	$pusherConfig = json_decode($config["pusher"]);
	$pusher = new Pusher($pusherConfig->key, $pusherConfig->secret, $pusherConfig->id, ["encrypted" => true]);


	//determine which HTTP method was used
	$method = array_key_exists("HTTP_X_HTTP_METHOD", $_SERVER) ? $_SERVER["HTTP_X_HTTP_METHOD"] : $_SERVER["REQUEST_METHOD"];

	$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
	$messageText = filter_input(INPUT_GET, "messageText", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$messageReceiverId = filter_input(INPUT_GET, "messageReceiverId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	$messageSenderId= filter_input(INPUT_GET, "messageSenderId", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);

	//establish pdo connection
	$pdo = connectToEncryptedMySQL("/etc/apache2/capstone-mysql/kitecrypt.ini");


	if(($method === "DELETE") && (empty($id) === true || $id < 0)) {
		throw(new InvalidArgumentException("id cannot be empty or negative", 405));
	}

	if($method === "GET") {
		if(empty($id) === false) {
			$reply->data = Message::getMessageByMessageId($pdo, $id);
		}


	}






	if($method === "POST") {

		//set XSRF cookie
		setXsrfCookie("/");
		verifyXsrf();

		$requestContent = file_get_contents("php://input");
		$requestObject = json_decode($requestContent);
		/*-----checking and sanitizing message text--------------*/
		//check that email and password fields are not empty, and sanitize that input

		if(empty($requestObject->messageId) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$methodId = filter_var($requestObject->methodId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		if(empty($requestObject->messageSenderId) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$messageSenderId = filter_var($requestObject->messageSenderId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}

		if(empty($requestObject->messageReceiverId) === true) {
			throw(new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		} else {
			$messageReceiverId = filter_var($requestObject->messageReceiverId, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		}


		//retrieve the data for messageId


		$messageTextFromDatabase = \Edu\Cnm\KiteCrypt\Message::getMessageByMessageSenderId($pdo, $messageId);

		$messageSenderId = $messageTextFromDatabase->getMessageFromDatabase();

		$messageReceiverId = $messageTextFromDatabase->getMessageFromDatabase();

		if($messageTextFromDatabase === null || $messageId === null){
			throw( new \InvalidArgumentException($exceptionMessage, $exceptionCode));
		}

		if($messageSenderId === null || $messageReceiverId === null){
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