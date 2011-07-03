<?php
	session_start();
	include "classes/user.php";
	include "classes/nc.php";

	$logged_in = false;

	if ( isset( $_SESSION['userName'] ) )
		$logged_in = true;
	else
		$logged_in = false;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<?php include "helpers/head.php"  ?>
  <body>
	<table id="basic" width="100%">
			<tr>
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
				</td>
				<td id="content">
					<div id="page_title">About the Rqts - CATS System</div>
					<p>Some information about this package</p>
					<p>
					Software version 1.00.0
					</p>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include "helpers/footer.php"; ?>
				</td>
			</tr>
		</table>
	</body
</html>
