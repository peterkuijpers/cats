<?php
/*
 *
 */
require_once("classes/tc_calendar.php");
$id = "date1";
if ( isset( $_GET['id']) ) {
	$id= $_GET['id'];
}
$myCalendar = new tc_calendar($id, true, false);
$myCalendar->setIcon("calendar/images/iconCalendar.gif");
$myCalendar->setDate(date('d'), date('m'), date('Y'));
$myCalendar->setPath("calendar/");
$myCalendar->setYearInterval(2011, 2018);
$myCalendar->dateAllow('2011-01-01', '2025-12-31');
$myCalendar->setDateFormat('Y-m-d');
//$myCalendar->setHeight(350);
//$myCalendar->autoSubmit(true, "form1");
$myCalendar->setAlignment('left', 'bottom');
//$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-04", "2011-12-25"), 0, 'year');
//$myCalendar->setSpecificDate(array("2011-04-10", "2011-04-14"), 0, 'month');
//$myCalendar->setSpecificDate(array("2011-06-01"), 0, '');
$myCalendar->writeScript();
?>
