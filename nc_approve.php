<?php
/**
 * User has to be logged in
 * User has to have 'focal' level
 * User must be assigned as 'focal' to the NC
 */

session_start();

	$error_msg;
	$success_msg;
	// Page accessible if logged in
	if ( ! isset( $_SESSION['userName'] ) ) {
		$logged_in = false;
		header( "Location: index.php");
	}

	$userName = $_SESSION['userName'];
	$user = Db::readUser( $userName );
	$ncId = $_GET['id'];
	$nc = Db::readNonCompliance($ncId);
	$logged_in = true;



?>

?>
