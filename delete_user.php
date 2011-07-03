<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "classes/dbAccess.php";

$id=$_GET['id'];
Db::deleteUser( $id );
header("Location: users.php")
?>
