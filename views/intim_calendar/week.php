<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$calendar = "";
$calendar .= "<table class='calendar_week'><tr><td colspan='5' class='intim_week_nextANDprevious'><span class='left_side'><a href='index.php?page=intim_calendar&term={$term}&date=$now' class='button'>Dnes</a></span><a href='index.php?page=intim_calendar&term=week&date=$previousDate' class='previousANDnext_headline'><</a><a href='index.php?page=intim_calendar&term=week&date=$nextDate' class='previousANDnext_headline'>></a><span class='right_side'><a href='index.php?page=intim_calendar&term=week&date=$today_const' class='button'>Týden</a><a href='index.php?page=intim_calendar&term=month&date=$today_const' class='button'>Měsíc</a><a href='index.php?page=intim_calendar&term=year&date=$today_const' class='button'>Rok</a></span></td></tr>";
$calendar .= "<th colspan='2' id='calendar_week_header_date'></th><th>Teplota</th><th>Poznámka</th>";
for($i = 0; $i < 7; $i++){
	$day = $days[$i];
	if($day['id'] != 0){
		$calendar .= "<tr class='week_row' onclick='intimCalendarUpdate({$day['id']})'>";
	}else{
    	$calendar .= "<tr class='week_row' onclick='intimCalendarNew({$day['timestamp']})'>";
	}
    $calendar .= "<td class='calendar_week_date'>{$day['date']}</td><td  class='calendar_week_dayname'>{$day['name']}</td>";
    
    $calendar .= "<td  class='intim_week_blood ";
    if($day['blood'] != "0"){
        $calendar .= 'calendar_month_mentruace'.$day['blood'];
    }
   
    $calendar .= "'>";
    if($day['temperature'] != 0){
    	$calendar .= '<b>' . $day['temperature'] . '</b>°C';
    }
    $calendar .= "</td>";
    $calendar .= "<td  class='intim_week_blood ";
    if($day['blood'] != "0"){
    	$calendar .= 'calendar_month_mentruace'.$day['blood'];
    }
     
    $calendar .= "'>";
    if($day['factors'] != ""){
    	$calendar .= "<span title='{$day['factors']}'><img src='images/view/intim_calendar/factors.png' class='intim_calendar_others_img'></span>";
    }
    if($day['phlegm'] != ""){
    	$calendar .= "<span title='{$day['phlegm']}'><img src='images/view/intim_calendar/phlegm.png' class='intim_calendar_others_img'></span>";
    }
    if($day['suppository'] != ""){
    	$calendar .= "<span title='{$day['suppository']}'><img src='images/view/intim_calendar/suppository.png' class='intim_calendar_others_img'></span>";
    }
    if($day['comment'] != ""){
    	$calendar .= "<span title='{$day['comment']}'><img src='images/view/intim_calendar/comment.png' class='intim_calendar_others_img'></span>";
    }
    $calendar .= "</td></tr>";
}
$calendar .= "</table>";


return $calendar;