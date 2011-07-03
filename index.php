<?php
	session_start();
	include "classes/user.php";
	include "classes/nc.php";

	$logged_in = false;
	if ( isset( $_SESSION['userName'] ) ) {
		$logged_in = true;
/*		if ( isset( $_SESSION['ncId'])) {
			$ncId = $_SESSION['ncId'];
			$str = "Location: nc_detail.php?id=$ncId";
			header( $str);
		}
 *
 */
	} else
		$logged_in = false;
	//
	// log in form is submitted and handled
	if ( $_POST['__LOGIN__'] ) {
		$userName = $_POST['userName'];
		$password = $_POST['password'];
		$encrPwd = md5($password);
		$validCombination = Db::checkLogin( $userName, $encrPwd );
		if ( $validCombination ) {
			$_SESSION['userName'] = $userName;
			$_SESSION['pwd'] = $encrPwd;
			$logged_in = true;
		} else {
			$logged_in = false;
			$error_msg = "Failed to log in";
		}
	}
	//
	// log out form is submitted and handled
	if ( $_POST['__LOGOUT__']) {
		unset( $_SESSION['userName'] );
		unset( $_SESSION['pwd'] );
		unset( $_SESSION['ncId']);
		$logged_in = false;
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
						if ( $logged_in ) {
							include "helpers/nc_filter.php";
						}
					?>
				</td>
				<td id="content" valign="top">   <!-- MAIN CONTENT -->
					<?php
						if ( $error_msg)
							echo "<div id='error_msg'>$error_msg</div>";
						if (! $logged_in ) {
							include "helpers/login_form.php";
						} else {    // logged in
								include "helpers/list.php";
							echo "<br>";
							echo <<<NEWFORM
					<form method="POST" action="nc_new.php">
						<input type="submit" value="New NC">
					</form>
					<br>
NEWFORM;
						}
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
