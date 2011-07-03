<?php
/**
 * Non compliance category
 * category has an id, a name and a description
 */
class Category {
	private $categoryId;
	private $name;
	private $description;

	public function Category() {
	}

	public function setId( $id ) {
		if ( !$id )
			return false;
		else
			$this->categoryId = $id;
	}
	public function getId() {
		return $this->categoryId;
	}
	public function setName( $name ) {
		if ( !$name )
			return false;
		else
			$this->name = $name;
	}
	public function getName() {
		return $this->name;

	}
	public function setDescription( $description ) {
		if ( ! $description )
			return false;
		else
			$this->description = $description;
	}
	public function getDescription( ) {
		return $this->description;
	}
}

?>