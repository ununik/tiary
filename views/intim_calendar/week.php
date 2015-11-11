<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$calendar = "";
$calendar .= $calendar_term;
$calendar .= "<table class='calendar_week'><tr><td colspan='5' class='intim_week_nextANDprevious'><a href='index.php?page=intim_calendar&term=week&date=$previousDate'>Předchozí týden</a><a href='index.php?page=intim_calendar&term=week&date=$nextDate'>Následující týden</a></td></tr>";
$calendar .= "<th colspan='2' id='calendar_week_header_date'></th><th>Teplota</th><th>Mentruace / Ovulace</th><th>Poznámka</th>";
foreach($days as $day){
	if($day['id'] != 0){
		$calendar .= "<tr class='week_row' onclick='intimCalendarUpdate({$day['id']})'>";
	}else{
    	$calendar .= "<tr class='week_row' onclick='intimCalendarNew({$day['timestamp']})'>";
	}
    $calendar .= "<td class='calendar_week_date'>{$day['date']}</td><td  class='calendar_week_dayname'>{$day['name']}</td><td class='intim_week_temperatur'>";
    if($day['temperature'] != 0){
        $calendar .= $day['temperature'];
    }
    $calendar .= "</td><td  class='intim_week_blood ";
    if($day['blood'] != "0"){
        $calendar .= 'calendar_month_mentruace'.$day['blood'];
    }
   
    $calendar .= "'></td><td>";
    if($day['factors'] != ""){
    	$calendar .= "<span title='{$day['factors']}'>F</span>";
    }
    if($day['phlegm'] != ""){
    	$calendar .= "<span title='{$day['phlegm']}'>H</span>";
    }
    if($day['suppository'] != ""){
    	$calendar .= "<span title='{$day['suppository']}'>Č</span>";
    }
    if($day['comment'] != ""){
    	$calendar .= "<span title='{$day['comment']}'>P</span>";
    }
    $calendar .= "</td></tr>";
}
$calendar .= "</table>";


return $calendar;