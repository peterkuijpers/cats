<?php
 session_start();
	$error_msg;
	$success_msg;

	include "classes/user.php";
	include "classes/nc.php";
	include "functions/mailFunctions.php";

	$CCStatus;

	$logged_in = false;
	// check if logged in
	if ( ! isset( $_SESSION['userName'] ) ) {
		$logged_in = false;
		header("Location: index.php");
	}
	// is logged in
	$user = Db::readUser( $_SESSION['userName']);
	$logged_in = true;
	if ( isset($_SESSION['ncId'] )) {
		$ncId= $_SESSION['ncId'];
		$nc = Db::readNonCompliance($ncId);
		$ncStatusId = $nc->getStatusId();
		if ( $ncStatusId < 3 )   // <3 = nc not approved
			$msg = "Non Compliance must be approved before Correct and Contain can start";
	} else
		$msg = "NO NC selected";
	



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

				</td>
				<td id="content" valign="top">    <!-- CONTENT -->
					<div id="page_title">Correct and Contain</div>
					<hr>

					<?php
						if ($error_msg )
							echo "<div id='error_msg'>$error_msg</div>";
						if ($success_msg )
							echo "<div id='success_msg'>$success_msg</div>";
						if ($msg )
							echo "<div>$msg</div>";
						if ( isset($ncStatusId )) {
							if ($ncStatusId >= 3) { //status is approved or higher
								include "helpers/cc_form.php";
							}
						}
					?>
					<br>
				</td>
			</tr>
			<tr id="footer">
				<td colspan="2">
					<?php include "helpers/footer.php"; ?>
				</td>
			</tr>
		</table>
    </body>
</html>
