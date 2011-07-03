<?php
	session_start();
	include "classes/user.php";

	$logged_in = false;
	if ( ! isset( $_SESSION['userName'] ) ) {
		$logged_in = false;
		header("Location: index.php");
	}
	$logged_in = true;
	$userName = $_SESSION['userName'];
	$user = Db::readUser( $userName );

	$users = Db::readUsers();


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
					<div id="page_title">Add user</div>
					<hr>
					<?php
						include "helpers/user_form.php";
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

