<?php
function build_calendar($month, $year) {
	$daysOfWeek = array('S','M','T','W','T','F','S');
	$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
	$numberDays = date('t',$firstDayOfMonth);
	$dateComponents = getdate($firstDayOfMonth);
	$monthName = $dateComponents['month'];
	$dayOfWeek = $dateComponents['wday'];
	$calendar = "<table class='calendar table card-text'>";
	//$calendar .= "<caption>$monthName $year</caption>";
	$calendar .= "<tr>";
	foreach($daysOfWeek as $day) {
		$calendar .= "<th class='header'>$day</th>";
	}
	$currentDay = 1;
	$calendar .= "</tr><tr>";
	if ($dayOfWeek > 0) {
		$calendar .= "<td colspan='$dayOfWeek'>&nbsp;</td>";
	}
	$month = str_pad($month, 2, "0", STR_PAD_LEFT);
	while($currentDay <= $numberDays){
		if($dayOfWeek == 7){
			$dayOfWeek = 0;
			$calendar .= "</tr><tr>";
		}
		$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
		$date = "$year-$month-$currentDayRel";
		
		$monthInt = (int) $month;
		$day_url = base_url("index.php/AdminController/dayView/$year/$monthInt/$currentDay");
		// Is this today?
		if(date('Y-m-d') == $date) {
			$calendar .= "<td class='day' success rel='$date'><a class='' href='$day_url' role='button'>$currentDay</a></td>";
		} else {
			$calendar .= "<td class='day' rel='$date'><a class='' href='$day_url' role='button'>$currentDay</a></td>";
		}
		$currentDay++;
		$dayOfWeek++;
	}
	if($dayOfWeek != 7){
		$remainingDays = 7 - $dayOfWeek;
		$calendar .= "<td colspan='$remainingDays'>&nbsp;</td>";
	}
	$calendar .= "</tr>";
	$calendar .= "</table>";
	return $calendar;
}
 
$calendar = build_calendar(6, 2019);
$calendar = '<div style="width:100%">' . $calendar . '</div>';
$calendar .= '<style type="text/css">table tbody tr td, table tbody tr th { text-align: center; }</style>';
print($calendar);
