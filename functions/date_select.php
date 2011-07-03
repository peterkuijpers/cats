<?php
/*
 *
 */
require_once("classes/tc_calendar.php");
class MyDate {
	
	public static function selection( $id, $time=null ) {
		if ( !$id )
			$id="date1";

		$myCalendar = new tc_calendar( $id, true, false);
		$myCalendar->setIcon("calendar/images/iconCalendar.gif");
		if ($time)
			$myCalendar->setDate(date('d',$time), date('m', $time), date('Y', $time));
		
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
	}
}
?>
