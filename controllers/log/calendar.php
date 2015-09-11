<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:05
 */
if(!isset($_GET['term']) || $_GET['term']==""){
    $term = "week";
}else{
    $term = $_GET['term'];
}
$daysname = array("Ne","Po", "Út", "St", "Čt", "Pá", "So", "Ne");
$days = array();
$today = strtotime('today');
if(isset($_GET['date']) && is_numeric($_GET['date'])){
 $today =  $_GET['date'];
}

switch($term){
    case "week":
        $plus = "+8 days";
        $nextDate =  "+8 days";
        $previousDate = "-8 days";
        $num = 8;
        break;
    case "day":
        $plus = "+1 days";
        $nextDate =  "+1 days";
        $previousDate = "-1 days";
        $num = 1;
        break;
    case "month":
        $today = strtotime(date('Y-m-01', $today));
        $firstday_num = date('w', $today);
        $plus = "next months";
        $nextDate =  "next months";
        $previousDate = "last month";
        $num = cal_days_in_month(CAL_GREGORIAN,date('m', $today),date('Y'));
        break;
    default:
        $plus = "+8 days";
        $nextDate =  "+8 days";
        $previousDate = "-8 days";
        $num = 8;
        $term = "week";
        break;
}

$next = strtotime($plus, $today);
$nextDate = strtotime($nextDate, $today);
$previousDate = strtotime($previousDate, $today);
$events = new Event();
$eventsAll = $events->getEvents($today, $next);
$calendar = "<a href='index.php?page=calendar&term=day&date=$today'>Den</a>
             <a href='index.php?page=calendar&term=week&date=$today'>Týden</a>
             <a href='index.php?page=calendar&term=month&date=$today'>Měsíc</a>";

for($i=0; $i < $num; $i++){
    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    $days[$i]['timestamp'] = $today;
    foreach($eventsAll as $event){
        if($event['timestamp1'] >= $today && $event['timestamp1']<strtotime('+1 day', $today)){
            $days[$i]['events'][] = "<a href='index.php?page=calendar_event&id={$event['id']}'>{$event['title']}</a>";
        }
    }
    $days[$i]['events'][] = "<a href='index.php?page=calendar_new_event&timestamp=$today' class='calendar_add_new'>+</a>";

    $today = strtotime('+1 day', $today);
}



$calendar .= include_once("views/calendar/$term.php");
return  $calendar;

