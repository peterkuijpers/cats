<?php
/* 
 *
 */
include "./classes/dbAccess.php";

class User {
	private $userId;
	private $userName;
	private $firstName;
	private $lastName;
	private $encrPwd;
	private $email;
	private $admin=0;

	public function User( $userName="", $firstName="", $lastName="", $email="" ) {
		$this->userId = 0;
		$this->userName = $userName;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;

	}

	public function setUserId( $userId ) {
		if ( ! $userId )
			return false;
		else {
			$this->userId = $userId;
			return true;
		}
	}
	public function getUserId( ) {
		return $this->userId;
	}

	public function setUserName( $userName ) {
		if ( ! $userName )
			return false;
		else {
			$this->userName = $userName;
			return true;
		}
	}
	public function getUserName(  ) {
		return $this->userName;
	}
	/**
	 * Get short name like: "J. Doe"
	 * @return string 
	 */
	public function getShortUserName() {
		return substr($this->firstName, 0, 1).'. '.$this->lastName;
	}
	public function setFirstName( $firstName ) {
		if ( ! $firstName )
			return false;
		else {
			$this->firstName = $firstName;
			return true;
		}
	}
	public function getFirstName( ) {
		return $this->firstName;
	}

	public function setLastName( $lastName) {
		if ( ! $lastName )
			return false;
		else {
			$this->lastName = $lastName;
			return true;
		}
	}
	public function getLastName(  ) {
		return $this->lastName;
	}

	public function setEmail( $email ) {
		if ( ! $email )
			return false;
		else
			$this->email = $email;
	}
	public function getEmail( ) {
		return $this->email;
	}

	public function setAdmin( $admin) {
		if ( !$admin )
			return false;
		else
			$this->admin = $admin;
	}
	public function isAdmin( ) {
		return $this->admin;
	}

	public function setEncrPassword( $encrPassword ) {
		if ( ! $encrPassword )
			return false;
		$this->encrPwd = $encrPassword;
		return true;
	}

	public function checkPassword( $encrPassword ) {
		if ( !$encrPassword )
			return false;
		if ( $encrPassword == $this->encrPwd )
				return true;
		else
			return false;
	}
	public function getEncrPassword() {
		return $this->encrPwd;
	}
}
?>
