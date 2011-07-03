<?php
	$cats = Db::readCategories();
	foreach ( $cats as $cat ) {
		echo "<option value='".$cat->getId()."'>".$cat->getName()."</option>";
	}
?>