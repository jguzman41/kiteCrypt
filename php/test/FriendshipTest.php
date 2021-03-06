<?php

namespace Edu\Cnm\KiteCrypt\Test;

use Edu\Cnm\KiteCrypt\{Profile, Friendship};

// Include the project test parameters
require_once("KiteCryptTest.php");

// Include the class under scrutiny
require_once(dirname(__DIR__) . "/class/autoloader.php");


/**
 * Full PHPUnit test for the Friendship class
 *
 * This is a complete PHPUnit test of the Friendship class. It is complete because *ALL* mySQL/PDO enabled methods
 * are tested for both invalid and valid inputs.
 *
 * @see Friendship
 * @author G. Wells <gwells4@cnm.edu>
 **/
class FriendshipTest extends KiteCryptTest {

	/**
	 * Profile that sent the Invitation of Friendship (the inviter); it is a foreign key
	 * @var Profile inviter
	 **/
	protected $inviter = null;

	/**
	 * Profile that accepted the Invitation of Friendship (the invitee); it is a foreign key
	 * @var Profile invitee
	 **/
	protected $invitee = null;


	/**
	 * Create the dependent objects needed before running each test
	 **/
	public final function setUp() {
		// run the default setup() method first
		parent::setUp();

		// create and insert a Profile that sent the Invitation of Friendship (the inviter); it is a foreign key
		$this->inviter = new Profile(null, "friendship_inviter", "1234", "5678", "rock");
		$this->inviter->insert($this->getPDO());

		// create and insert a Profile that sent the Invitation of Friendship (the inviter); it is a foreign key
		$this->invitee = new Profile(null, "friendship_invitee", "1234", "5678", "sea");
		$this->invitee->insert($this->getPDO());

	}


	/**
	 * Try creating a Friendship with a negative inviterId
	 *
	 * @expectedException RangeException
	 **/
//	public function testCreatingFriendshipWithNegativeInviterId() {
//
//		$friendship = new Friendship(-1, $this->invitee->getProfileId());
//
//	}
//
//
//	/**
//	 * Try creating a Friendship with a negative inviteeId
//	 *
//	 * @expectedException RangeException
//	 **/
//	public function testCreatingFriendshipWithNegativeInviteeId() {
//
//		$friendship = new Friendship($this->inviter->getProfileId(),-1);
//
//	}
//
//
//	/**
//	 * Try creating a Friendship with an inviterId that's a string
//	 *
//	 * @expectedException TypeError
//	 **/
//	public function testCreatingFriendshipWithStringInviterId() {
//
//		$friendship = new Friendship("id", $this->invitee->getProfileId());
//
//	}
//
//
//	/**
//	 * Try creating a Friendship with an inviteeId that's a string
//	 *
//	 * @expectedException TypeError
//	 **/
//	public function testCreatingFriendshipWithStringInviteeId() {
//
//		$friendship = new Friendship($this->inviter->getProfileId(), "id");
//
//	}
//
//
//	/**
//	 * Try inserting a valid Friendship and verify that the actual data matches what was inserted
//	 **/
//	public function testInsertValidFriendship() {
//
//		// Count the number of rows (before inserting the new Friendship) and save it,
//		// so, later, we can make sure that a new row was added in the database when we created the new Friendship
//		$numRows = $this->getConnection()->getRowCount("friendship");
//
//		// Create the new Friendship and insert it into the database
//		$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
//		$friendship->insert($this->getPDO());
//
//		// Check that the number of rows in the database increased by one, when the new Friendship was inserted
//		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("friendship"));
//
//		// Use the inviterId to get the Friendship just created and check that it matches what should have been put in.
//		$pdoFriendship1 = Friendship::getFriendshipByFriendshipInviterId($this->getPDO(), $this->inviter->getProfileId());
//		$this->assertEquals($pdoFriendship1[0]->getFriendshipInviterId(), $this->inviter->getProfileId());
//
//		// Use the inviteeId to get the Friendship just created and check that it matches what should have been put in.
//		$pdoFriendship2 = Friendship::getFriendshipByFriendshipInviteeId($this->getPDO(), $this->invitee->getProfileId());
//		$this->assertEquals($pdoFriendship2[0]->getFriendshipInviteeId(), $this->invitee->getProfileId());
//
//	}
//
//
//	/**
//	 * Try inserting a Friendship with an invalid inviterId
//	 *
//	 * @expectedException PDOException
//	 **/
//	public function testInsertFriendshipWithInvalidInviterId() {
//
//		// Create a Friendship with a non null tweet id and watch it fail
//		$friendship = new Friendship(KiteCryptTest::INVALID_KEY, $this->invitee->getProfileId());
//		$friendship->insert($this->getPDO());
//
//	}
//
//
//	/**
//	 * Try inserting a Friendship with an invalid inviteeId
//	 *
//	 * @expectedException PDOException
//	 **/
//	public function testInsertFriendshipWithInvalidInviteeId() {
//
//		// Create a Friendship with a non null tweet id and watch it fail
//		$friendship = new Friendship($this->inviter->getProfileId(), KiteCryptTest::INVALID_KEY);
//		$friendship->insert($this->getPDO());
//
//	}
//
//
//	/**
//	 * Try inserting a Friendship and then deleting it
//	 * Verify that the deleted Friendship is not there
//	 *
//	 * @expectedException \RuntimeException
//	 **/
//	public function testDeletingValidFriendship() {
//
//		// Count the number of rows (before inserting the new Friendship) and save it
//		$numRows = $this->getConnection()->getRowCount("friendship");
//
//		// Create a new Friendship and insert it into the database
//		$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
//		$friendship->insert($this->getPDO());
//
//		// Check that the number of rows in the database increased by one, when the new Friendship was inserted
//		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("friendship"));
//
//		// Delete the Friendship from the database
//		$friendship->delete($this->getPDO());
//
//		// Check that the number of rows in the database decreased by one, so that the number of rows
//		// is back to what it was before the new Friendship was inserted
//		$this->assertEquals($numRows, $this->getConnection()->getRowCount("friendship"));
//
//		// Try to get the deleted Friendship from the database (using the inviterId)
//		// and verify that it does not exist (that is a null is returned)
//		$pdoFriendship1 = Friendship::getFriendshipByFriendshipInviterId($this->getPDO(), $this->inviter->getProfileId());
//		$this->assertNull($pdoFriendship1[0]);
//
//		// Try to get the deleted Friendship from the database (using the inviteeId)
//		// and verify that it does not exist (that is a null is returned)
//		$pdoFriendship2 = Friendship::getFriendshipByFriendshipInviteeId($this->getPDO(), $this->invitee->getProfileId());
//		$this->assertNull($pdoFriendship2[0]);
//
//	}
//
//
//	/**
//	 * Try deleting a Friendship that does not exist
//	 **/
//	public function testDeletingNonexistentFriendship() {
//
//		// Create a Friendship and try to delete it without actually inserting it
//		$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
//		$friendship->delete($this->getPDO());
//
//	}
//
//
//	/**
//	 * Try getting a valid Friendship and getting it with an invalid inviterId
//	 *
//	 * @expectedException \RangeException
//	 **/
//	public function testGettingValidFriendshipWithInvalidInviterId() {
//
//		// Count the number of rows (before inserting the new Friendship) and save it,
//		// so, later, we can make sure that a new row was added in the database when we created the new Friendship
//		$numRows = $this->getConnection()->getRowCount("friendship");
//
//		// Create the new Friendship and insert it into the database
//		$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
//		$friendship->insert($this->getPDO());
//
//		// Check that the number of rows in the database increased by one, when the new Friendship was inserted
//		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("friendship"));
//
//		// Use an invalid inviterId to get the Friendship just created.
//		// A RangeException should occur.
//		$pdoFriendship = Friendship::getFriendshipByFriendshipInviterId($this->getPDO(), -1);
//		//$this->assertEquals($pdoFriendship[0]->getFriendshipInviterId(), $this->inviter->getProfileId()); // Commented out because it is assigned by MySQL
//
//	}
//
//
//	/**
//	 * Try getting a valid Friendship and getting it with an invalid inviteeId
//	 *
//	 * @expectedException \RangeException
//	 **/
//	public function testGettingValidFriendshipWithInvalidInviteeId() {
//
//		// Count the number of rows (before inserting the new Friendship) and save it,
//		// so, later, we can make sure that a new row was added in the database when we created the new Friendship
//		$numRows = $this->getConnection()->getRowCount("friendship");
//
//		// Create the new Friendship and insert it into the database
//		$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
//		$friendship->insert($this->getPDO());
//
//		// Check that the number of rows in the database increased by one, when the new Friendship was inserted
//		$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("friendship"));
//
//		// Use an invalid inviterId to get the Friendship just created.
//		// A RangeException should occur.
//		$pdoFriendship = Friendship::getFriendshipByFriendshipInviteeId($this->getPDO(), -1);
//		//$this->assertEquals($pdoFriendship[0]->getFriendshipInviteeId(), $this->inviter->getProfileId()); // Commented out because it is assigned by MySQL

//	}
	public function testFriendshipIdCreationOfFriends() {
	// Count the number of rows (before inserting the new Friendship) and save it,
	// so, later, we can make sure that a new row was added in the database when we created the new Friendship
	$numRows = $this->getConnection()->getRowCount("friendship");

	// Create the new Friendship and insert it into the database
	$friendship = new Friendship($this->inviter->getProfileId(), $this->invitee->getProfileId());
		$friendship->setFriendshipId($this->inviter->getProfileId(), $this->invitee->getProfileId());
		var_dump($friendship);
	$friendship->insert($this->getPDO());

	// Check that the number of rows in the database increased by one, when the new Friendship was inserted
	$this->assertEquals($numRows + 1, $this->getConnection()->getRowCount("friendship"));

	// Use the inviterId to get the Friendship just created and check that it matches what should have been put in.
	$pdoFriendship1 = Friendship::getFriendshipByFriendshipInviterId($this->getPDO(), $this->inviter->getProfileId());
	$this->assertEquals($pdoFriendship1[0]->getFriendshipInviterId(), $this->inviter->getProfileId());

	// Use the inviteeId to get the Friendship just created and check that it matches what should have been put in.
	$pdoFriendship2 = Friendship::getFriendshipByFriendshipInviteeId($this->getPDO(), $this->invitee->getProfileId());
	$this->assertEquals($pdoFriendship2[0]->getFriendshipInviteeId(), $this->invitee->getProfileId());

}



}