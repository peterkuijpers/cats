<?php
	$users = Db::readUsers();
	foreach ( $users as $user ) {
		echo "<option value='".$user->getUserId()."'>".$user->getShortUserName()."</option>";
	}
?>
