<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 18.09.2015
 * Time: 12:55
 */

$calendar = "";
$dayNum = 0;
$calendar .= "<table id='intim_year_table'><th colspan='32'><div class='calendar_js_month'><span class='left_side'><a href='index.php?page=intim_calendar&term={$term}&date=$now' class='button'>Dnes</a></span><a href='index.php?page=intim_calendar&term=year&date=$previousDate'><span>$prevYear</span></a>$yearDate<a href='index.php?page=intim_calendar&term=year&date=$nextDate'><span>$nextYear</span></a><span class='right_side'><a href='index.php?page=intim_calendar&term=week&date=$today_const' class='button'>Týden</a><a href='index.php?page=intim_calendar&term=month&date=$today_const' class='button'>Měsíc</a><a href='index.php?page=intim_calendar&term=year&date=$today_const' class='button'>Rok</a></span></div></th><tr><td></td>";
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

foreach($First_day_of_menstraution_img as $time){
	$calendar .= "<img src='controllers/log/intim/intim_calendar_graf.php?first_day=$time' class='intim_calendar_graf'>";
}
return $calendar;