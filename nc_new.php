<?php
 session_start();
	include "classes/user.php";
	include "classes/nc.php";
	require_once "classes/tc_calendar.php";
	include "functions/mailFunctions.php";

	$error_msg;
	
	if ( ! isset( $_SESSION['userName'] ) ) {
		$logged_in = false;
		header( "Location: index.php");
	}
	$userName = $_SESSION['userName'];
	$user = Db::readUser( $userName );
	$nc = new Nc();
	$nc->setInitiatorId( $user->getUserId() );
	$logged_in = true;


	if (isset( $_POST['__SUBMIT__'])) {
		$initId  = $user->getUserId();
		$cat = $_POST['category'];
		$initDate = $_POST['date5'];
		$focalId = $_POST['focal'];
		$qty = $_POST['qty'];
		$statusId = 2; //status is submit
		$typeId = $_POST['typeId'];
		$summary = $_POST['summary'];
		$details = $_POST['details'];

		$nc->setInitiatorId($initId);
		$nc->setCategoryId($cat);
		$nc->setInitDate($initDate);
		$nc->setFocalId($focalId);
		$nc->setQty($qty);
		$nc->setStatusId($statusId);
		$nc->setTypeId($typeId);
		$nc->setSummary( $summary );
		$nc->setDetails( $details );
		// write to db
		$result =  Db::writeNonCompliance( $nc ); 
		// result contains false or  number of new nc
		if ($result ) {
			$nc->setNcId($result);
			if ( mailToConfirmSubmission(  $nc ) )
				echo "confirm submission mail sent";
			else
				$error_msg = "confirmation email not sent";
			if ( mailForApproval ( $nc) )
				echo "approval mail sent";
			else
				$error_msg = "approval email not sent";

			echo "<script language=javascript>alert('New non-compliance is entered in the system and email for approval is sent to ".$focal->getShortUserName()." ');window.location='index.php';</script>";
		} else
			$error_msg="Error";

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

				</td>
				<td id="content" valign="top">    <!-- CONTENT -->
					<div id="page_title">New Non-Compliance</div>

					<?php
						if ($error_msg )
							echo $error_msg;
						include "helpers/nc_new_form.php";
					?>
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
