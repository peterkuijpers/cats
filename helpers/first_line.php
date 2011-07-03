<?php
/* 
 * Very first line on the page
 */
if ( isset( $_SESSION['userName'] ) ) {

	$userName = $_SESSION['userName'];
	$user = Db::readUser( $userName );
	$fullName = $user->getFirstName()." ".$user->getLastName();
	$logged_in=true;
}
?>

<table id="first_line" width="100%">
	<tr>
		<td align="left">
			<a href="index.php">Home</a>
			<?php if ( $logged_in) {
				echo "<a href='settings.php'>Settings</a>";
				if ( $user->isAdmin() )
					echo "<a href='users.php'>User-admin</a>";
			}
			?>
		</td>
		<td align="right">
			<?php
			if ( $logged_in ) {
				echo "<ul>";
				echo "<li>Welcome $fullName</li>";
				echo "<li>";
				echo "<form style='margin-bottom:0px;' method='POST' action='index.php'>";
				echo "<input style='margin-bottom:0px;' type='hidden' name='__LOGOUT__' value='true'>";
				echo "<input type='submit' value='Logout'>";
				echo "</form></li>";
				echo "</ul>";
			}
			?>
		</td>
	</tr>
</table>
