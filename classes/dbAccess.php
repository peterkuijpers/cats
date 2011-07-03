<?php

include 'category.php';
include 'nctype.php';
include 'status.php';
include 'ccitem.php';
/* 
 * 
 */
class Db {
	private static $dbURL;
	private static $dbUserName;
	private static $dbPassword;
	private static $dbName;
	private static $errorMsg;
	/**
	 * Initialize the Database connection
	 * Read connection data from conf.php
	 * Return $connection
	 */
	private static function initDb() {
		if ( !isset($_SESSION['dbURL'])) {
			include("conf/conf.php");
			$dbConf = new Conf();
			$dbURL = $dbConf->getDbURL();
			$dbUserName = $dbConf->getDbUserName();
			$dbPassword = $dbConf->getDbPassword();
			$dbName = $dbConf->getDbName();

			//Set DB Info. in-session
			$_SESSION['dbURL']=$dbURL;
			$_SESSION['dbUserName']=$dbUserName;
			$_SESSION['dbPassword']=$dbPassword;
			$_SESSION['dbName']=$dbName;

		} else {
			$dbURL = $_SESSION['dbURL'];
			$dbUserName = $_SESSION['dbUserName'];
			$dbPassword = $_SESSION['dbPassword'];
			$dbName = $_SESSION['dbName'];
		}
		$connection = mysql_connect($dbURL,$dbUserName,$dbPassword)
			or die ("Error while connecting to host");
		$db = mysql_select_db($dbName,$connection)
			or die ("Error while connecting to database");

		return $connection;
	}

	/*
	DB Closing method.
	Pass the connection variable
	obtained through initDB().
	*/
	private static function closeDB($connection)  {
		mysql_close($connection);
	}
	/**
	 * Read a user from the database by its userId
	 * @param <type> $userName
	 * @return <type> $user
	 */
	public static function readUserById( $userId ) {
		$returnArr = Array();
		$user;
		if ( !$userId ) {
			return false;
		} else {
			$connection = Db::initDb();
			$user = new User();
			$query = "SELECT * FROM user WHERE user_id=$userId";
			$result = mysql_query( $query );
			$temp = mysql_fetch_object($result);
			$user->setUserName( $temp->user_name  );
			$user->setFirstName( $temp->first_name  );
			$user->setLastName( $temp->last_name  );
			$user->setEmail( $temp->email  );

			Db::closeDb( $connection );
		}
		return $user;
	}

	/**
	 * Read a user from the database
	 * @param <type> $userName
	 * @return <type> $user
	 */
	public static function readUser( $userName ) {
		if ( !$userName or $userName == "" ) {
			return false;
		} else {
			$connection = Db::initDb();
			$user = new User();
			$query = "SELECT * FROM user WHERE user_name='$userName'";
			$result = mysql_query($query );
			if ( $temp = mysql_fetch_object($result) ) {
				$user->setUserId( $temp->user_id );
				$user->setUserName( $temp->user_name  );
				$user->setFirstName( $temp->first_name  );
				$user->setLastName( $temp->last_name  );
				$user->setEmail( $temp->email  );
				$user->setAdmin( $temp->admin_level);
			}
			Db::closeDb( $connection );
			return $user;
		}
	}
	/**
	 * Read all users from database into array of users
	 * Return array of users
	 */
	public static function readUsers() {
		$returnArr = Array();

		$connection = Db::initDb();
		$user = new User();
		$query = "SELECT * FROM user";
		$result = mysql_query( $query );
		while ( $temp = mysql_fetch_object($result) ) {
			$user = new User();
			$user->setUserId( $temp->user_id );
			$user->setUserName( $temp->user_name  );
			$user->setFirstName( $temp->first_name  );
			$user->setLastName( $temp->last_name  );
			$user->setEmail( $temp->email  );
			$user->setAdmin( $temp->admin_level );

			$returnArr[] = $user;
		}
		Db::closeDb( $connection );
		return $returnArr;
	}

	/**
	 * write a user to the database
	 * @param <type> $user
	 * @return <type> true or false
	 */
	public static function writeUser( $user ) {
		if ( !$user ) {
			return false;
		} else {
			$connection = Db::initDb();

			$userName = $user->getUserName();
			$encrPassword = $user->getEncrPassword();
			$fname = $user->getFirstName();
			$lname = $user->getLastName();
			$email = $user->getEmail();
			$admin = $user->isAdmin();

			$query = "INSERT INTO user ( user_name, password, first_name, last_name, email, admin_level )";
			$query .= "VALUES( '$userName', '$encrPassword','$fname', '$lname', '$email', $admin )";
			$result = mysql_query( $query )
				or die("insert failed: ".mysql_error());
			Db::closeDb( $connection );
			return $result;
		}
	}
public static function deleteUser( $id ) {
	if ( ! $id )
		return false;
	$connection = Db::initDb();
	$query = "DELETE FROM user WHERE user_id=$id";
	$result = mysql_query($query);
	Db::closeDB($connection);
	return $result;
}
	/**
	 *
	 */
	public static function checkLogin( $userName, $encrPwd ) {
		if ( !$userName or !$encrPwd )
			return false;
		else if ( $userName  == "" or $encrPwd == "" )
			return false;
		else {
			$connection = Db::initDb();
			$query = "SELECT count(*) FROM user WHERE user_name='$userName' and password='$encrPwd'";
			$result = mysql_query( $query ) or die( "Select user failed: ".mysql_error() );
			$row = mysql_fetch_row( $result );
			if ( $row[0] )
				$retVal  = true;
			else 
				$retVal = false;

			Db::closeDB($connection);
			return $retVal;	   
		}
	}
	/**
	 * Write a Non Compl to the db
	 * return true or false
	 */
	public static function writeNonCompliance( $nc ) {
		if ( ! $nc )
			return false;
		$connection = Db::initDb();
		$initId = $nc->getInitiatorId();
		$categoryId = $nc->getCategoryId();
		$details = $nc->getDetails();
		$focalId = $nc->getFocalId();
		$initDate = $nc->getInitDate();
		$qty = $nc->getQty();
		$statusId = $nc->getStatusId();
		$summary = $nc->getSummary();
		$typeId = $nc->getTypeId();

		$query =  "INSERT INTO nc ( initiator_id, init_date, category_id, focal_id, nc_type_id, qty, status_id, summary, details) ";
		$query .= "VALUES( $initId, '$initDate', $categoryId, $focalId, $typeId, $qty, $statusId, '$summary', '$details' )";
		$result = mysql_query( $query ) or die("Failed to insert nc: ".mysql_error());
		if ( $result )
			$result = mysql_insert_id ();   // get the auto-increment value
		Db::closeDb( $connection );
		return $result;
	}
	/**
	 * Update a Non Compl to the db
	 * return true or false
	 */
	public static function updateNonComplianceStatus( $nc ) {
		if ( ! $nc )
			return false;
		$connection = Db::initDb();
		$statusId = $nc->getStatusId();
		$id = $nc->getNcId();
		$query =  "UPDATE nc SET status_id=$statusId WHERE nc_id=$id";
		$result = mysql_query( $query ) or die("Failed to update nc: ".mysql_error());

		Db::closeDb( $connection );
		return $result;
	}

	/**
	 * Read one Non Compliance with $ncId from the database
	 * @param <type> $ncId
	 */
	public static function readNonCompliance( $ncId) {
		if ( !$ncId )
			return false;
		else if ( $ncId == "" )
			return false;
		else {
			$nc;
			$connection = Db::initDb();
			$query = "SELECT * FROM nc WHERE nc_id=$ncId";
			$result = mysql_query( $query ) or die("Select nc failed: ".mysql_error() );
			$obj = mysql_fetch_object( $result );
			if ( $obj ) {
				$nc = new Nc();
				$nc->setNcId( $obj->nc_id);
				$nc->setInitiatorId( $obj->initiator_id );
				$nc->setInitDate( $obj->init_date );
				$nc->setFocalId( $obj->focal_id);
				$nc->setCategoryId( $obj->category_id );
				$nc->setStatusId( $obj->status_id );
				$nc->setQty( $obj->qty );
				$nc->setTypeId( $obj->nc_type_id );
				$nc->setSummary( $obj->summary );
				$nc->setDetails($obj->details );
			}
			return $nc;
		}
	}

	/**
	 * Read all NonCompliances from the database
	 * @return array of Nc
	 */
	public static function readNonCompliances() {
		$resultArr = Array();
		$connection = Db::initDb();
		$query = "SELECT * FROM nc";
		$result = mysql_query( $query ) or die("Select nc failed: ".mysql_error() );
		while ( $obj = mysql_fetch_object( $result ) ) {
			$nc = new Nc();
			$nc->setNcId( $obj->nc_id);
			$nc->setInitiatorId( $obj->initiator_id );
			$nc->setInitDate( $obj->init_date );
			$nc->setFocalId( $obj->focal_id );
			$nc->setTypeId( $obj->nc_type_id );
			$nc->setCategoryId( $obj->category_id );
			$nc->setStatusId( $obj->status_id );
			$nc->setQty( $obj->qty );
			$nc->setTypeId( $obj->nc_type_id );
			$nc->setSummary( $obj->summary );
			$nc->setDetails($obj->details );
			$resultArr[] = $nc;
		}
		return $resultArr;
	}
	/**
	 * Read a single category from the db, indentified by categoryId
	 * @param <type> $categoryId
	 */
	public static function readCategory( $categoryId) {
		if ( ! $categoryId )
			return false;
		$cat;
		$connection = Db::initDb();
		$query = "SELECT * FROM category WHERE category_id=$categoryId";
		$result = mysql_query( $query ) or die("Select category failed: ".mysql_error() );
		if ( $obj = mysql_fetch_object( $result ) ) {
			$cat = new Category();
			$cat->setId( $obj->category_id);
			$cat->setName( $obj->name );
			$cat->setDescription( $obj->description );
		}
		Db::closeDB($connection);
		return $cat;
	}
	/**
	 * Read all categories from the db, indentified by categoryId
	 * @param <type> $categoryId
	 */
	public static function readCategories( ) {

		$cats = Array();
		$connection = Db::initDb();
		$query = "SELECT * FROM category";
		$result = mysql_query( $query ) or die("Select category failed: ".mysql_error() );
		while ( $obj = mysql_fetch_object( $result ) ) {
			$cat = new Category();
			$cat->setId( $obj->category_id);
			$cat->setName( $obj->name );
			$cat->setDescription( $obj->description );
			$cats[] = $cat;
		}
		Db::closeDB($connection);
		return $cats;
	}

	/**
	 * Read the NC Type for ncTypeId
	 */
	public static function readNcType( $ncTypeId ) {
		if ( ! $ncTypeId )
			return false;
		$ncType;
		$connection = Db::initDb();
		$query = "SELECT * FROM nc_type WHERE nc_type_id=$ncTypeId";
		$result = mysql_query( $query ) or die("Select nc-type failed: ".mysql_error() );
		if ( $obj = mysql_fetch_object($result) ) {
			$ncType = new NcType();
			$ncType->setId( $obj->nc_type_id );
			$ncType->setName( $obj->name );
			$ncType->setDescription( $obj->description );
		}
		Db::closeDB($connection);
		return $ncType;
	}
	/**
	 * Read all NC Types
	 */
	public static function readNcTypes(  ) {
		$ncTypes = Array();
		$connection = Db::initDb();
		$query = "SELECT * FROM nc_type";
		$result = mysql_query( $query ) or die("Select nc-type failed: ".mysql_error() );
		while ( $obj = mysql_fetch_object($result) ) {
			$ncType = new NcType();
			$ncType->setId( $obj->nc_type_id );
			$ncType->setName( $obj->name );
			$ncType->setDescription( $obj->description );
			$ncTypes[] = $ncType;
		}
		Db::closeDB($connection);
		return $ncTypes;
	}
	/**
	 * Read the NC Status for statusId
	 */
	public static function readStatus( $statusId ) {
		if ( !$statusId )
			return false;
		$status;
		$connection = Db::initDb();
		$query = "SELECT * FROM status WHERE status_id=$statusId";
		$result = mysql_query($query) or die("Select status failed: ".mysql_error() );
		if ( $obj = mysql_fetch_object( $result )) {
			$status = new Status();
			$status->setId( $obj->status_id );
			$status->setName( $obj->name );
			$status->setDescription( $obj->description );
		}
		Db::closeDB($connection);
		return $status;
	}
	/**
	 * read all correct-and-contain items that belong to an NC
	 */
	public static function readCcItems( $ncId) {
		if ( !$ncId )
			return false;

		$resultArr = Array();
		$connection = Db::initDb();
		$query = "SELECT * FROM cc_item WHERE nc_id=$ncId";
		$result = mysql_query($query);
		while ( $obj = mysql_fetch_object($result)) {
			$ccItem = new CcItem();
			$ccItem->setId( $obj->id);
			$ccItem->setNcId($obj->nc_id);
			$ccItem->setDescription($obj->description);
			$ccItem->setOwnerId($obj->owner_id);
			$ccItem->setDueDate($obj->due_date);
			$ccItem->setCompletionDate($obj->completion_date);
			$resultArr[] = $ccItem;
		}
		Db::closeDB($connection);
		return $resultArr;
	}
	/**
	 * Write a Correct and Contain item to the database
	 * Returns the new item id ( or false)
	 * @param <type> $ccItem 
	 */
	public static function writeCcItem( $ccItem ) {
		if ( !$ccItem )
			return false;
		$connection = Db::initDb();
		$ncId = $ccItem->getNcId();
		$description = $ccItem->getDescription();
		$ownerId = $ccItem->getOwnerId();
		$dueDate = $ccItem->getDueDate();
		$completionDate = $ccItem->getCompletionDate();

		$query =  "INSERT INTO cc_item ( nc_id, description, owner_id, due_date, completion_date ) ";
		$query .= "VALUES( $ncId, '$description', $ownerId, '$dueDate', '$completionDate' )";
		$result = mysql_query( $query ) or die("<b>Failed to insert cc-item: ".mysql_error()."</b>");
		if ( $result )
			$result = mysql_insert_id ();   // get the auto-increment value
		Db::closeDb( $connection );
		return $result;
	}
	public static function deleteCcItem( $id ) {
		if ( ! id )
			return false;
		$connection = Db::initDb();
		$query = "DELETE FROM cc_item WHERE id=$id";
		$result = mysql_query( $query ) or die(mysql_error() );
		Db::closeDB($connection);
		return $result;
	}
}

?>
