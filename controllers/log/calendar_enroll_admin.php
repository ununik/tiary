<?php

$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);
 if($event['enroll'] != 1 || $event['author'] != $profil->getId()){
  header("location: index.php?page=calendar_event&id={$_GET['id']}");
 } 
 
 $mainTitle = $event['title'];
$enroll = $eventDB->getEnroll($_GET['id'], $event['author']);
$person = new Enroll();
$person = $person->getEnroll($_GET['id']);
include ("views/calendar/enroll-table.php");
return include_once("views/calendar/enroll_admin-html.php");