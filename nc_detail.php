<?php
	session_start();
	include "classes/user.php";
	include "classes/nc.php";
	include "functions/mailFunctions.php";

	$logged_in = false;
	if ( isset( $_SESSION['userName'] ) ) {
		$user = Db::readUser( $_SESSION['userName']);
		$logged_in = true;
		if (isset( $_GET['id'])) {
			$ncId = $_GET['id'];
			$_SESSION['ncId'] = $ncId;
			$nc = Db::readNonCompliance($ncId);
		}
	} else {
		$logged_in = false;
		header("Location: index.php");
	}
	if ( $_POST['__APPROVED__']) {
		$nc->setStatusId(3);  // Needs some  work: 3=approved
		if ( Db::updateNonComplianceStatus($nc) ) {
			mailToConfirmApproval($nc);
			mailToInformInitiatorAboutApproval( $nc);
			$success_msg = "Successfully approved this non-compliance";
		}

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
					<?php include "helpers/left_status.php"; ?>
				</td>
				<td id="content" valign="top">    <!-- CONTENT -->
					<?php
					if ( $success_msg )
						echo "<div id='success_msg'>$success_msg</div>";
					?>
					<div id="page_title">Non-Compliance details</div>
					<hr>
					<?php include("helpers/nc_form.php"); ?>
					<br>
					<?php
					// if current user is focal and status of the nc=submitted then show this button
					
					if ( $user->getUserId() == $nc->getFocalId() && $nc->getStatusId() == 2 ) {
					echo <<<FORMAPP
						<form action="nc_detail.php?id=$ncId" method="POST">
						<input type="hidden" name="__APPROVED__" value="true">
						<input type="submit" value="Approve" >
					</form>
FORMAPP;
					}

						?>
					
				</td>  <!-- end of CONTENT -->
			</tr>
			<tr id="footer">
				<td colspan="2">
					<?php include "helpers/footer.php"; ?>
				</td>
			</tr>
		</table>
    </body>
</html>
