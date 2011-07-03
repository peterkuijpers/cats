<?php
/* 
 * Database access configuration
 */
class Conf {
	private $databaseURL = "localhost";
    private $databaseUserName = "root";
    private $databasePassword = "root123";
    private $databaseName = "rqts";
	private $SMTP = "mail.optusnet.com.au";

    function getDbURL() {
        return $this->databaseURL;
    }

    function getDbUserName() {
        return $this->databaseUserName;
    }

    function getDbPassword() {
        return $this->databasePassword;
    }

    function getDbName() {
        return $this->databaseName;
    }
	function getSMTP() {
		return $this->SMTP;
	}
}

?>
