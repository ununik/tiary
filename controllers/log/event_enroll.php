<?php   
$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);
$enroll = $eventDB->getEnroll($_GET['id'], $event['author']);
$mainTitle = $event['title'];
$name = "";
$email = "";
$age = "";
$club = "";
if($event['timestamp1'] == $event['timestamp2'] || $event['timestamp2'] == 0){
    $date = date("j. n. Y", $event['timestamp1']);
}else{
    $date = date("j. n. Y", $event['timestamp1']).' - '.date("j. n. Y", $event['timestamp2']);
}


$gender = "<option value='m'>Muž</option>";
$gender .= "<option value='f'>Žena</option>";

return include_once("views/calendar/enroll-html.php");