<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$calendar = "";

$calendar .= $calendar_term;

$calendar .= "<table class='calendar_month'><th colspan='7' id='calendar_week_header_date'><div class='calendar_js_month'><a href='index.php?page=intim_calendar&term=month&date=$previousDate'><span>{$month['month-1']}</span></a>{$month['month']}<a href='index.php?page=intim_calendar&term=month&date=$nextDate'><span>{$month['month+1']}</span></a></th><tr>";
for($i=1; $i<8; $i++){
    $calendar .= "<td class='calendar_month_dayname'>{$daysname[$i]}</td>";
}
$calendar .= "</tr><tr>";
$NDay = 0;
if($firstday_num == 0){
$firstday_num = 7;
}
for($i=0; $i<$firstday_num-1; $i++){
    $calendar .= "<td class='calendar_month_noDay'></td>";
    $NDay++ ;
}

for($monthDay = 1; $monthDay <= $num; $monthDay++){
    if($NDay > 6){
        $calendar .= "</tr><tr>";
        $NDay = 0;
    }

    if($days[$monthDay-1]['id'] != 0) {
        $calendar .= "<td class='calendar_month_day_active calendar_month_day_active_empty";
        $calendar .= " ";
        if($days[$monthDay-1]['timestamp'] >= $now && $days[$monthDay-1]['timestamp'] < $now+86400){
            $calendar .= " calendar_month_today ";
        }
        $calendar .= " calendar_month_mentruace{$days[$monthDay - 1]['blood']}' onclick='intimCalendarUpdate({$days[$monthDay-1]['id']})'><span class='calendar_month_date'>{$days[$monthDay-1]['day']}</span>";
        if($days[$monthDay - 1]['temperature'] != 0) {
            $calendar .= '<span class="calendar_month_temperature">' . $days[$monthDay - 1]['temperature'] . '°C</span>';
        }


        $calendar .= "<div>";
        if($days[$monthDay - 1]['factors'] != ""){
            $calendar .= "<span title='{$days[$monthDay - 1]['factors']}'>F</span>";
        }
        if($days[$monthDay - 1]['phlegm'] != ""){
            $calendar .= "<span title='{$days[$monthDay - 1]['phlegm']}'>H</span>";
        }
        if($days[$monthDay - 1]['suppository'] != ""){
            $calendar .= "<span title='{$days[$monthDay - 1]['suppository']}'>Č</span>";
        }
        if($days[$monthDay - 1]['comment'] != ""){
            $calendar .= "<span title='{$days[$monthDay - 1]['comment']}'>P</span>";
        }
        $calendar .= "</div>";



    }else {
        $calendar .= "<td class='calendar_month_day_active calendar_month_day_active_empty' onclick='intimCalendarNew({$days[$monthDay - 1]['timestamp']})' title='Přidat záznam'><span class='calendar_month_date'>{$days[$monthDay-1]['day']}</span>";
    }
    $calendar .= "<div '></div>";
    $calendar .= "</td>";
    $NDay++;
}



for($NDay; $NDay<7; $NDay++){
    $calendar .= "<td class='calendar_month_noDay'></td>";
}


$calendar .= "</tr></table>";

return $calendar;