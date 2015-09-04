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

switch($term){
    case "week":
        $plus = "+8 days";
        $num = 8;
        break;
    case "day":
        $plus = "+1 days";
        $num = 1;
        break;
    default:
        $plus = "+8 days";
        $num = 8;
        break;
}

$next = strtotime($plus, $today);
$events = new Event();
$eventsAll = $events->getEvents($today, $next);


for($i=0; $i < $num; $i++){
    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    foreach($eventsAll as $event){
        if($event['timestamp1'] >= $today && $event['timestamp1']<strtotime('+1 day', $today)){
            $days[$i]['events'][] = "<a href='index.php?page=calendar_event&id={$event['id']}'>{$event['title']}</a>";
        }
    }
    $days[$i]['events'][] = "<a href='index.php?page=calendar_new_event&timestamp=$today'>+</a>";

    $today = strtotime('+1 day', $today);
}


return include_once("views/calendar/$term.php");