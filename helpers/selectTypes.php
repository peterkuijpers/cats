<?php
	$types = Db::readNcTypes();
	foreach ( $types as $type ) {
		echo "<option value='".$type->getId()."'>".$type->getName()."</option>";
	}
?>