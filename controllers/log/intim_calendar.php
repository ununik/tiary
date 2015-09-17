<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:54
 */
if($profil->getGender() != "f"){
    return '<h3>Pro užívání této funkce musíte mít v profilu označené, že jste žena!';
}

if(!isset($_GET['term']) || $_GET['term']==""){
    $term = "week";
}else{
    $term = $_GET['term'];
}
$today = strtotime('tomorrow');
$daysname = array("Ne","Po", "Út", "St", "Čt", "Pá", "So", "Ne");
$mesic = array("leden","únor", "březen", "duben", "květen", "červen", "červenec", "srpen", "září", "říjen", "listopad", "prosinec");
$days = array();
if(isset($_GET['date']) && is_numeric($_GET['date'])){
    $today =  $_GET['date'];
}

switch($term){
    case "week":
        $today = strtotime("-8 days", $today);
        $plus = "+15 days";
        $nextDate =  "+15 days";
        $previousDate = "+1 days";
        $num = 8;
        break;
    case "day":
        $today = strtotime("-1 days");
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
        $today = strtotime("-8 days", $today);
        $plus = "+15 days";
        $nextDate =  "+15 days";
        $previousDate = "+1 days";
        $num = 8;
        $term = "week";
        break;
}

$next = strtotime($plus, $today);
$nextDate = strtotime($nextDate, $today);
$previousDate = strtotime($previousDate, $today);
$entries = new IntimCalendar();
$entriesAll = $entries->getEntries($today, $next, $profil->getId());
$thisWeek = strtotime("+8 days",$today);


$calendar_term = "<div>
             <a href='index.php?page=intim_calendar&term=week&date=$thisWeek' class='button'>Týden</a>
             <a href='index.php?page=intim_calendar&term=month&date=$today' class='button'>Měsíc</a></div>";

$month['monthNum'] = date("n", $today);
$month['month'] = $mesic[$month['monthNum']-1] . ' '. date("Y", $today);
$month['month-1'] = $mesic[$month['monthNum']-2];
$month['month+1'] = $mesic[$month['monthNum']];
for($i=0; $i < $num; $i++){

    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    $days[$i]['day'] = date("j", $today);
    $days[$i]['timestamp'] = $today;
    $days[$i]['temperature'] = 0;
    $days[$i]['blood'] = 0;
    foreach($entriesAll as $entry){
        if($entry['date'] > strtotime('-1 day', $today) && $entry['date']<=$today){
            $days[$i]['temperature'] = "{$entry['temperature']}";
            $days[$i]['blood'] = "{$entry['blood']}";
            $days[$i]['id'] = "{$entry['id']}";
        }
    }
    $today = strtotime('+1 day', $today);
}


$list = include_once("views/intim_calendar/$term.php");


$intimCalendarContainer = include_once('views/intim_calendar/calendar.php');

return $intimCalendarContainer;