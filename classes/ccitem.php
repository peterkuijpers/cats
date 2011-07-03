<?php
/* 
 * Correct and Contain items are connected to a Non Compliance (NC)
 * They are the action items that need to be carried out for a non-compliance
 */

class CcItem {
	private $id;
	private $description;
	private $dueDate;
	private $completionDate;
	private $ownerId;
	private $ncId;

	public function CcItem() {
	}
	public function setId( $id ) {
		if ( !$id )
			return false;
		$this->id = $id;
	}
	public function getId() {
		return $this->id;
	}
	public function setDescription( $description ) {
		if ( !$description)
			return false;
		$this->description = $description;
		return true;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDueDate( $dueDate ) {
		if ( ! $dueDate )
			return false;
		$this->dueDate = $dueDate;
		return true;
	}
	public function getDueDate( ) {
		return $this->dueDate;
	}
	public function setCompletionDate( $completionDate ) {
		if ( ! $completionDate )
			return false;
		$this->completionDate = $completionDate;
		return true;
	}
	public function getCompletionDate() {
		return $this->completionDate;
	}
/*
	public function setOwner( $user ) {
		if ( !$user )
			return false;
		$this->ownerId = $user->getUserId();
	}
 */
	public function setOwnerId( $id ) {
		if (!$id )
			return false;
		$this->ownerId = $id;
	}
	public function getOwnerId() {
		return $this->ownerId;
	}
	public function setNcId( $ncId ) {
		if ( !$ncId )
			return false;
		$this->ncId = $ncId;
	}
	public function getNcId() {
		return $this->ncId;
	}
}
?>
