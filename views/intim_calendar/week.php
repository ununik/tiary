<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$calendar = "";
$calendar .= $calendar_term;
$calendar .= "<a href='index.php?page=intim_calendar&term=week&date=$previousDate'>P?edchozí týden</a><a href='index.php?page=intim_calendar&term=week&date=$nextDate'>Následující týden</a>";
$calendar .= "<table class='calendar_week'><th colspan='2' id='calendar_week_header_date'>{$days[0]['date']} - {$days[7]['date']}</th><th>Teplota</th><th>Mentruace</th>";
foreach($days as $day){
    $calendar .= "<tr><td class='calendar_week_date'>{$day['date']}</td><td  class='calendar_week_dayname'>{$day['name']}</td><td>";
    if($day['temperature'] != 0){
        $calendar .= $day['temperature'];
    }
    $calendar .= "</td><td>";
    if($day['blood'] != 0){
        $calendar .= $day['blood'];
    }
    $calendar .= "</td></tr>";
}
$calendar .= "</table>";


return $calendar;