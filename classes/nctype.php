<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class NcType {
	private $id;
	private $name;
	private $description;
	
	public function NcType() {
	}
	
	public function setId( $id ) {
		if ( !$id )
			return false;
		else 
			$this->id = $id;
	}
	
	public function getId() {
		 return $this->id;
	}

	public function setName( $name ) {
		if ( !$name ) 
			return false;
		else
			$this->name = $name;
	}
	public function getName( ) {
		return $this->name;
	}
	
	public function setDescription( $description ) {
		if ( !$description )
			return false;
		else
			$this->description = $description;
	}
	
	
	
}


?>
