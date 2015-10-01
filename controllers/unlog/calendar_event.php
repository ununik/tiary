<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 03.09.2015
 * Time: 13:06
 */
$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);
$enrollDB = $eventDB->getEnroll($_GET['id'], $event['author']);
$mainTitle = $event['title'];
$subscription = nl2br ($event['subscription']);
$place = nl2br ($event['place']);
$update = 0;
$type = $eventDB->getType($event['type']);
$type = $type['cz'];
$enroll = $event['enroll'];

$time = time();
$starttimestamp = $enrollDB['starttimestamp'];
$startEnroll = date("j. n. Y", $starttimestamp);

if($event['timestamp1'] == $event['timestamp2'] || $event['timestamp2'] == 0){
    $date = date("j. n. Y", $event['timestamp1']);
}else{
    $date = date("j. n. Y", $event['timestamp1']).' - '.date("j. n. Y", $event['timestamp2']);
}
if($event['organisator'] != ""){
    $organisator = $event['organisator'];

}else{
    $organisator = new Profil($event['id_organisator']);
    $organisator = $organisator->getName();
}

return include_once("views/calendar/login-event.php");