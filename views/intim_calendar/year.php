<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 18.09.2015
 * Time: 12:55
 */

$calendar = "";
$calendar .= $calendar_term;
$dayNum = 0;
$calendar .= "<table id='intim_year_table'><th colspan='32'><div class='calendar_js_month'><a href='index.php?page=intim_calendar&term=year&date=$previousDate'><span>$prevYear</span></a>$yearDate<a href='index.php?page=intim_calendar&term=year&date=$nextDate'><span>$nextYear</span></a></div></th><tr><td></td>";
for($day = 1; $day < 32; $day++){
    $calendar .= "<td class='intim_year_headTable'>$day</td>";
}
$calendar .= "</tr>";
for($month = 0; $month < 12; $month++){
    $calendar .= "<tr>";
    $calendar .= "<td>{$mesic[$month]}</td>";

    $dayInMonth = cal_days_in_month(CAL_GREGORIAN, $month+1, $yearDate);
    for($day = 1; $day < 32; $day++) {


        if ($day <= $dayInMonth) {
            $calendar .= "<td class='intimeYearActiveDay intim_year_blood{$days[$dayNum]['blood']}";
            if ($days[$dayNum]['timestamp'] >= $now && $days[$dayNum]['timestamp'] < $now + 86400) {
                $calendar .= " calendar_month_today ";
            }
            $calendar .= "' ";
            if($days[$dayNum]['id'] != 0){
                $calendar .= " onclick='intimCalendarUpdate({$days[$dayNum]['id']})' ";
            }else{
                $calendar .= " onclick='intimCalendarNew({$days[$dayNum]['timestamp']})' ";
            }
            $calendar .= "></td>";
        } else {
            $dayNum--;
            $calendar .= "<td class='intim_year_none'></td>";
        }
        $dayNum++;
    }
    $calendar .= "</tr>";
}
$calendar .= "</table>";
return $calendar;