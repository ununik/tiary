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
    case "month":
        $today = strtotime(date('Y-m-01', $today));
        $firstday_num = date('w', $today);
        $plus = "next months";
        $nextDate =  "next months";
        $previousDate = "last month";
        $num = cal_days_in_month(CAL_GREGORIAN,date('m', $today),date('Y'));
        break;
    case "year":
        $today = strtotime(date('Y-01-01', $today));
        $firstday_num = date('w', $today);
        $plus = "next year";
        $nextDate =  "next year";
        $previousDate = "last year";
        $num = cal_days_in_month(CAL_GREGORIAN,date('d', $today),date('Y'));
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
             <a href='index.php?page=intim_calendar&term=month&date=$today' class='button'>Měsíc</a>
             <a href='index.php?page=intim_calendar&term=year&date=$today' class='button'>Rok</a></div>";

if($term == "month") {
    $month['monthNum'] = date("n", $today);
    $month['month'] = $mesic[$month['monthNum'] - 1] . ' ' . date("Y", $today);
    $month['month-1'] = $mesic[$month['monthNum'] - 2];
    $month['month+1'] = $mesic[$month['monthNum']];
}
for($i=0; $i < $num; $i++){

    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    $days[$i]['day'] = date("j", $today);
    $days[$i]['timestamp'] = $today;
    $days[$i]['temperature'] = 0;
    $days[$i]['id'] = 0;
    $days[$i]['ovulation'] = 0;
    if(!isset($days[$i]['blood'])) {
        $days[$i]['blood'] = 0;
    }
    foreach($entriesAll as $entry){
        if($entry['date'] > strtotime('-1 day', $today) && $entry['date']<=$today){
            $days[$i]['temperature'] = "{$entry['temperature']}";
            if($days[$i]['blood'] == "0") {
                $days[$i]['blood'] = "{$entry['blood']}";
            }
            $days[$i]['id'] = "{$entry['id']}";
            $days[$i]['ovulation'] = $entry['ovulation'];
        }
    }
    $today = strtotime('+1 day', $today);

    if($days[$i]['ovulation'] == 1){
        $days[$i + 1]['blood'] = "_1";
        $days[$i]['blood'] = "_2";
        if($i > 1) {
            $days[$i - 1]['blood'] = "_1";
        }
        if($i > 2) {
            $days[$i - 2]['blood'] = "_1";
        }
        if($i > 3) {
            $days[$i - 3]['blood'] = "_1";
        }
    }
}

$list = include_once("views/intim_calendar/$term.php");

$intimCalendarContainer = include_once('views/intim_calendar/calendar.php');

return $intimCalendarContainer;