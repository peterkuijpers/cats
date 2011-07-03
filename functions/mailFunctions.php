<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include "conf/conf.php";

function mailForApproval(  $nc ) {
	// mail( to, subject, message )

	if ( !$nc )
		return false;
	else {
		$focal = Db::readUserById( $nc->getFocalId() );
		$to = $focal->getEmail();
		$subject = "CATS approval required";
		$message = "Hi ".$focal->getShortUserName()."\n\n";
		$message .= "A new non-compliance has been entered in the CATS System and has been assigned to you.\n";
		$message .= "The nc number is: ".$nc->getNcId()."\n";
		$message .= "Your approval is required for this non-compliance";
		$headers = 'From: webmaster@cats.com'."\r\n".
					'Reply-To: webmaster@cats.com'. "\r\n".
					'X-Mailer: PHP/'.phpversion();

		$conf = New Conf();
		$smtp = $conf->getSMTP();
		ini_set( 'SMTP', $smtp);
		mail( 'pjkui1@student.monash.edu.au', $subject, $message, $headers );
	}
}
function mailToConfirmSubmission(  $nc ) {
	// mail( to, subject, message, headers )

	if (  !$nc )
		return false;
	else {
		$initiator = Db::readUserById( $nc->getInitiatorId() );
		$to = $initiator->getEmail();
		$subject = "CATS Confirmation of submission of non-compliance";
		$message = "Hi ".$initiator->getShortUserName()."\n\n";
		$message .=	"This email is to confirm that a new non-compliance was entered into the CATS System.\n";
		$message .= "The nc number is: ".$nc->getNcId()."\n";
		$message .= "At this moment no actions are required by you regarding this non-compliance\n";

		$headers = 'From: webmaster@cats.com'."\r\n".
					'Reply-To: webmaster@cats.com'. "\r\n".
					'X-Mailer: PHP/'.phpversion();

		$conf = New Conf();
		$smtp = $conf->getSMTP();
		ini_set( 'SMTP', $smtp);

		mail( 'pjkui1@student.monash.edu.au', $subject, $message, $headers );
	}
}

function mailToConfirmApproval( $nc ) {
	if ( !$nc )
		return false;
	else {
		$focal = Db::readUserById( $nc->getFocalId() );
		$to = $focal->getEmail();
		$subject = "CATS Confirmation of accepting of non-compliance";
		$message = "Hi ".$focal->getShortUserName()."\n\n";
		$message .=	"This email is to confirm that non-compliance was accepted in the CATS System.\n";
		$message .= "The nc number is: ".$nc->getNcId()."\n";
		$message .= "If you haven't done so already, please start the Correct-and-Contain plan\n";

		$headers = 'From: webmaster@cats.com'."\r\n".
					'Reply-To: webmaster@cats.com'. "\r\n".
					'X-Mailer: PHP/'.phpversion();

		$conf = New Conf();
		$smtp = $conf->getSMTP();
		ini_set( 'SMTP', $smtp);

		mail( 'pjkui1@student.monash.edu.au', $subject, $message, $headers );
	}
}
function mailToInformInitiatorAboutApproval(  $nc ) {
	if ( !$nc )
		return false;
	else {
		$initiator = Db::readUserById( $nc->getInitiatorId() );
		$to = $initiator->getEmail();
		$subject = "CATS Information of accepting of non-compliance";
		$message = "Hi ".$initiator->getShortUserName()."\n\n";
		$message .=	"This email is to inform you that the non-compliance that you submitted in the CATS System\n";
		$message .=	"has now been accepted\n";
		$message .= "The nc number is: ".$nc->getNcId()."\n";
		$message .= "At this moment no actions are required by you regarding this non-compliance\n";

		$headers = 'From: webmaster@cats.com'."\r\n".
					'Reply-To: webmaster@cats.com'. "\r\n".
					'X-Mailer: PHP/'.phpversion();

		$conf = New Conf();
		$smtp = $conf->getSMTP();
		ini_set( 'SMTP', $smtp);

		mail( 'pjkui1@student.monash.edu.au', $subject, $message, $headers );
	}
}
?>
