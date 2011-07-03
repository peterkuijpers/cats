<?php
/* 
 * Non Compliance Class
 */
class Nc {
	private $ncId;
	private $initiatorId;
	private $initDate;
	private $categoryId;
	private $focalId;
	private $deptId;
	private $typeId;
	private $qty = 0;
	private $statusId;
	private $summary;
	private $details;

	public function Nc() {
		$statusId = 1;
		$initiatorId = 100;
	}
	public function setNcId( $ncId ) {
		if ( ! $ncId )
			return false;
		$this->ncId = $ncId;
		return true;
	}
	public function getNcId() {
		return $this->ncId;
	}
	public function setInitiatorId( $initId ) {
		if ( ! $initId )
			return false;
		$this->initiatorId = $initId;
		return true;
	}
	public function getInitiatorId() {
		return $this->initiatorId;
	}

	public function setInitDate( $initDate ) {
		if ( ! $initDate )
			return false;
		$this->initDate = $initDate;
		return true;
	}
	public function getInitDate() {
		return $this->initDate;
	}
	public function setCategoryId( $categoryId ) {
		if ( ! $categoryId )
			return false;
		$this->categoryId = $categoryId;
		return true;
	}
	public function getCategoryId() {
		return $this->categoryId;
	}
	public function setFocalId( $focalId ) {
		if ( ! $focalId )
			return false;
		$this->focalId = $focalId;
		return true;
	}
	public function getFocalId( ) {
		return $this->focalId;
	}
	public function setTypeId( $typeId ) {
		if ( ! $typeId )
			return false;
		$this->typeId = $typeId;
		return true;
	}
	public function getTypeId() {
		return $this->typeId;
	}
	public function setQty( $qty ) {
		if ( !$qty )
			$this->qty = 0;
		else
			$this->qty = $qty;
		return true;
	}
	public function getQty( ) {
		return $this->qty;
	}
	public function setStatusId( $statusId ) {
		if ( ! $statusId )
			return false;
		$this->statusId = $statusId;
		return true;
	}
	public function getStatusId( ) {
		return $this->statusId;
	}
	public function setSummary( $summary ) {
		if ( !summary )
			return false;
		$this->summary = $summary;
		return true;
	}
	public function getSummary() {
		return $this->summary;
	}
	public function setDetails( $details ) {
		if ( ! $details )
			return false;
		$this->details = $details;
		return true;
	}
	public function getDetails() {
		return $this->details;
	}
}

?>
