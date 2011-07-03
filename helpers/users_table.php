<table id="list_table">
	<tr>
		<th>id</th>
		<th>userName</th>
		<th>First Name</th>
		<th>Last name</th>
	</tr>
	<?php
		$users = Db::readUsers();
		foreach ( $users as $user ) {
			$id = $user->getUserId();
			echo "<tr>";
			echo "<td>$id</td>";
			echo "<td>".$user->getUserName()."</td>";
			echo "<td>".$user->getFirstName()."</td>";
			echo "<td>".$user->getLastName()."</td>";
			echo "<td><a href='user.php?id=$id'>Details</a></td>";
			echo "<td><a href='delete_user.php?id=$id' onclick='return confirm_delete( $id )'>Delete</a></td>";
			echo "</tr>";
		}
	?>
</table>
<br>
<form method="POST" action="user_form.php" >
<input type="submit" value="Add user">

</form>

