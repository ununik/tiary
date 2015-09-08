<?php

$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);
 if($event['enroll'] != 1 || $event['author'] != $profil->getId()){
  header("location: index.php?page=calendar_event&id={$_GET['id']}");
 } 
 
 $mainTitle = $event['title'];
$enroll = $eventDB->getEnroll($_GET['id'], $event['author']);
return include_once("views/calendar/enroll_admin-html.php");