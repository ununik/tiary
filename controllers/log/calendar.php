<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:05
 */
$daysname = array("Ne","Po", "Út", "St", "Čt", "Pá", "So", "Ne");
$days = array();
$today = strtotime('today');
$nextweek = strtotime('+8 days', $today);
$events = new Event();
$events->getEvents($today, $nextweek);

for($i=0; $i < 8; $i++){
    $days[$i]['name'] = $daysname[date("w", $today)];
    $days[$i]['date'] = date("j. n. Y", $today);
    $days[$i]['events'][] = "<a href='index.php?page=calendar_new_event&timestamp=$today'>+</a>";

    $today = strtotime('+1 day', $today);
}


return include_once("views/calendar/week.php");