<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:40
 */
$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);

if($event['author'] != $profil->getID()){
    header("location: index.php?page=calendar_event&id={$_GET['id']}");
}
$timestamp = $event['timestamp1'];
$err = array();
$mainTitle = $event['title'];
$headlineTitle = $event['title'];
if($event['id_organisator'] == $profil->getId()){
    $meOrganisator = 1;
}
$enrollSystem = $event['enroll'];
$organisator = $event['organisator'];
$subsciption = $event['subscription'];
$place = $event['place'];
$allPeople = 1;
$isSaved = $event['id'];
$save = "Upravit";
$accessPost = $event['access'];
$typePost = $event['type'];
$next = "";
if(isset($_POST['title'])){
    $isSaved = $_POST['isSaved'];
    $mainTitle = safeText($_POST['title']);
    $headlineTitle = $mainTitle;
    $enrollSystem = 0;

    if($mainTitle == ""){
        $err[] = "Není vyplněný nadpis!";
        $headlineTitle = "Nová událost";
    }elseif(strlen($mainTitle) > 255) {
        $err[] = "Příliš dlouhý nadpis!";
    }


    if(isset($_POST['meOrganisator'])) {
        $meOrganisator = safeText($_POST['meOrganisator']);

        if(isset($_POST['enrollSystem'])) {
            $enrollSystem = safeText($_POST['enrollSystem']);
        }
    }else{
        $meOrganisator = 0;
        $organisator = safeText($_POST['organisator']);
        if(strlen($organisator) > 255) {
            $err[] = "Příliš dlouhé jméno pořadatele!";
        }
    }


    $subsciption = safeText($_POST['subsciption']);
    $place = safeText($_POST['place']);

    $accessPost = safeText($_POST['access']);
    $typePost = safeText($_POST['eventType']);
    if(empty($err)){
        $database = new Event();
        if($isSaved == 0) {
            $isSaved = $database->setEvent($timestamp, 0, $profil->getId(), $profil->getId(), $organisator, $enrollSystem, $mainTitle, $subsciption, $place, $accessPost, $typePost);
            $err[] = "Úspěšně vytvořená událost!";
        }else{
            $database->updateEvent($timestamp, 0, $meOrganisator, $organisator, $enrollSystem, $mainTitle, $subsciption, $place, $accessPost, $typePost, $isSaved);
            $err[] = "Změny uloženy!";
        }
    }
}
$access = include("controllers/log/calendar/access_options.php");
$eventType = include("controllers/log/calendar/event_type.php");

if($isSaved != 0){
    $save = "Upravit";
}
if($enrollSystem == 1){
    $enrollButton = "<a href='index.php?page=calendar_new_event_enrollSystemSetting&id=$isSaved'><button  class='submit'>Přihlašovací systém</button></a>";
}else{
    $enrollButton = "";
}
return include_once("views/calendar/new-html.php");