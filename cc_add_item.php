<?php
/* 
 * Add an  item to the Correct and Contain list
 *
 */
 session_start();
	$error_msg;
	$success_msg;

	include "classes/user.php";
	include "classes/nc.php";
	require_once 'classes/ccitem.php';
	require_once "functions/date_select.php";


	$logged_in = false;
	// check if logged in
	if ( ! isset( $_SESSION['userName'] ) ) {
		$logged_in = false;
		header("Location: index.php");
	}
	$logged_in = true;
	$ncId = $_SESSION['ncId'];
	$user = Db::readUser( $_SESSION['userName']);

	if ( isset( $_POST['SUBMIT'])) {
		$description = $_POST['description'];
		$ownerId= $_POST['ownerId'];
		$dueDate = $_POST['dueDate'];
		$completionDate = $_POST['completionDate'];
		$ccItem = new CcItem();
		$ccItem->setNcId($ncId);
		$ccItem->setDescription($description);
		$ccItem->setOwnerId($ownerId);
		$ccItem->setDueDate($dueDate);
		$ccItem->setCompletionDate($completionDate);
		$result = Db::writeCcItem($ccItem);
		header("Location: cc_plan.php");
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
					<div id="page_title">Correct and Contain - Add item</div>
					<hr>

					<?php
						include "helpers/cc_item_form.php";
					?>
					<br>
					<a href="cc_plan.php">Back</a>
					<br>
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



