<?php
	session_start();
	include "classes/user.php";

	$error_msg;
	$success_msg;

	$logged_in = false;
	if ( isset( $_SESSION['userName'] ) ) {
		$logged_in = true;
		$userName = $_SESSION['userName'];
		$user = Db::readUser( $userName );
	} else {
		$logged_in = false;
		header("Location: index.php");
	}
	$users = Db::readUsers();

	if ( isset($_POST['_ADDUSER_'])) {
		//read info from form
		$user = new User();
		$user->setUserId($_POST['id']);
		$user->setUserName($_POST['userName']);
		$encrPassword = md5($_POST['password'] );
		$user->setEncrPassword( $encrPassword );
		$user->setFirstName($_POST['firstName'] );
		$user->setLastName($_POST['lastName'] );
		$user->setEmail($_POST['email'] );
		$user->setAdmin($_POST['admin'] );
		if (Db::writeUser($user) )
			$success_msg = "User successfully added";
		else
			$error_msg ="Failed to add user";

	}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<?php include "helpers/head.php"; ?>
    <body>
		<table id="basic" width="100%">
			<tr id="first_line" >
				<td colspan="2">
					<?php include "helpers/first_line.php"; ?>
				</td>
			</tr>
			<tr id="header">
				<td colspan="2">
					<?php include "helpers/header.php"; ?>
				</td>
			</tr>
			<tr id="top_menu">
				<td width="150px"></td>
				<td>
					<?php include("helpers/topMenu.php") ?>
				</td>
			</tr>
			<tr>
				<td id="left_menu">
					<?php
					?>
				</td>
				<td id="content" valign="top">   <!-- MAIN CONTENT -->
					<div id="page_title">User administration</div>
					<hr>
					<?php
					if ( $error_msg)
						echo "<div id='error_msg'>$error_msg</div>";
					if ($success_msg )
						echo "<div id='success_msg'>$success_msg</div>";
									
					include "helpers/users_table.php";
					?>
				</td>  <!-- end of Main Content -->
			</tr>
			<tr id="footer">
				<td colspan="2">
					<?php include "helpers/footer.php"; ?>
				</td>
			</tr>
		</table>
    </body>
</html>

