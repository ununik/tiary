<?php
$html->addCss("<link rel='stylesheet' href='views/css/intim_calendar/screen.css' type='text/css' media='screen'/>");
$html->addCss("<link rel='stylesheet' href='views/css/intim_calendar/mobile.css' type='text/css' media='handheld, only screen and (max-device-width: 1023px)'/>");

$html->addTitle('Můj intimní deníček');
if($profil->getGender() != "f"){
    return '<h3>Pro užívání této funkce musíte mít v profilu označené, že jste žena!';
}

if(!isset($_GET['term']) || $_GET['term']==""){
    $term = "week";
}else{
    $term = $_GET['term'];
}

$today = strtotime('today');
$daysname = array("Ne","Po", "Út", "St", "Čt", "Pá", "So", "Ne");
$mesic = array("leden","únor", "březen", "duben", "květen", "červen", "červenec", "srpen", "září", "říjen", "listopad", "prosinec", "leden");
$days = array();
if(isset($_GET['date']) && is_numeric($_GET['date'])){
    $today =  $_GET['date'];
}
$now = strtotime(date("Y-m-d"));
switch($term){
    case "week":
        $today = strtotime("last monday", $today);
        $plus = "+8 days";
        $nextDate =  "+8 days";
        $previousDate = "monday";
        $num = 7;
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
        $num = 366;
        $year = strtotime(date("Y", $today));
        $yearDate = date("Y", $today);
        $prevYear = $yearDate - 1;
        $nextYear = $yearDate + 1;
        $today = strtotime(date("Y-01-01", $today));
        $firstday_num = date('w', $today);
        $plus = "next year";
        $nextDate =  "next year";
        $previousDate = "last year";
        break;
    default:	
        $today = strtotime("last monday", $today);
        $plus = "+8 days";
        $nextDate =  "+8 days";
        $previousDate = "monday";
        $num = 7;
        break;
}
$today_const = $today;
$next = strtotime($plus, $today);
$nextDate = strtotime($nextDate, $today);
$previousDate = strtotime($previousDate, $today);
$entries = new IntimCalendar();
$temperatureSelect = $entries->getLastTemperatur($profil->getId());
$entriesAll = $entries->getEntries($today, $next, $profil->getId());
$thisWeek = strtotime("+8 days",$today);
$howLongBetweenMenstruation = $entries->howLongBetweenMenstruation($profil->getId());
$howLongMenstruation = $entries->howLongMenstruation($profil->getId());
$lastMenstruation = $entries->getLastMenstruation($profil->getId());
$lastOvulation = $entries->getLastOvulation($profil->getId());
$predictionTerm = 6;

if($term == "month") {
    $month['monthNum'] = date("n", $today);
    $month['month'] = $mesic[$month['monthNum'] - 1] . ' ' . date("Y", $today);
    if($month['monthNum'] == 1){
        $month['month-1'] = $mesic[11];
    }else {
        $month['month-1'] = $mesic[$month['monthNum'] - 2];
    }
    $month['month+1'] = $mesic[$month['monthNum']];
}
for($i=0; $i < $num; $i++){

    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    $days[$i]['day'] = date("j", $today);
    $days[$i]['timestamp'] = $today;
    $days[$i]['temperature'] = 0;
    $days[$i]['id'] = 0;
    $days[$i]['factors'] = "";
    $days[$i]['phlegm'] = "";
    $days[$i]['suppository'] = "";
    $days[$i]['comment'] = "";
    $days[$i]['ovulation'] = 0;
    if(!isset($days[$i]['blood'])) {
        $days[$i]['blood'] = 0;
    }


//forecast
    for($pre = 1; $pre <= $predictionTerm; $pre ++) {
        $forecast = strtotime(date('Y-m-d', $lastMenstruation + $pre * $howLongBetweenMenstruation));
        $forecastOvulationFuture = strtotime(date('Y-m-d', $lastOvulation + $pre * $howLongBetweenMenstruation));
        if ($today == $forecast) {
            $days[$i]['blood'] = "_forecast";
            for ($n = 1; $n < $howLongMenstruation-1; $n++) {
                $days[$i + $n]['blood'] = "_forecast";
            }
        }elseif($today == $forecastOvulationFuture){
            $days[$i]['blood'] = "_forecastOvulation";
            for ($n = -1; $n <= 1; $n++) {
                $days[$i + $n]['blood'] = "_forecastOvulation";
            }
        }
    }

    foreach($entriesAll as $entry){
        if($entry['date'] > strtotime('-1 day', $today) && $entry['date']<=$today){
            $days[$i]['temperature'] = "{$entry['temperature']}";
            if($days[$i]['blood'] == "0" || $days[$i]['blood'] == "") {
                $days[$i]['blood'] = "{$entry['blood']}";
            }
            $days[$i]['id'] = "{$entry['id']}";
            $days[$i]['factors'] = $entry['factors'];
            $days[$i]['phlegm'] = $entry['phlegm'];
            $days[$i]['suppository'] = $entry['suppository'];
            $days[$i]['comment'] = $entry['comment'];
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