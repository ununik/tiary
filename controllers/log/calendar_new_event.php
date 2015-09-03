<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:40
 */
if(isset($_GET['timestamp']) && $_GET['timestamp'] != ""){
    $timestamp = $_GET['timestamp'];
}else{
    $timestamp = time();
}
$err = array();
$mainTitle = "";
$headlineTitle = "Nová událost";
$meOrganisator = 1;
$enrollSystem = 0;
$organisator = "";
$subsciption = "";
$place = "";
$allPeople = 1;
$isSaved = 0;
$save = "Uložit";
$accessPost = "";
$typePost = "";
$next = "";
if(isset($_POST['title'])){
    $isSaved = $_POST['isSaved'];
    $mainTitle = $_POST['title'];
    $headlineTitle = $mainTitle;

    if($mainTitle == ""){
        $err[] = "Není vyplněný nadpis!";
        $headlineTitle = "Nová událost";
    }elseif(strlen($mainTitle) > 255) {
        $err[] = "Příliš dlouhý nadpis!";
    }


    if(isset($_POST['meOrganisator'])) {
        $meOrganisator = $_POST['meOrganisator'];
    }else{
        $meOrganisator = 0;
        $organisator = $_POST['organisator'];
        if(strlen($organisator) > 255) {
            $err[] = "Příliš dlouhé jméno pořadatele!";
        }
    }
    if(isset($_POST['enrollSystem'])) {
        $enrollSystem = $_POST['enrollSystem'];
    }else{
        $enrollSystem = 0;
    }

    $subsciption = $_POST['subsciption'];
    $place = $_POST['place'];

    $accessPost = $_POST['access'];
    $typePost = $_POST['eventType'];
}
$access = include("controllers/log/calendar/access_options.php");
$eventType = include("controllers/log/calendar/event_type.php");
if(empty($err)){
    $database = new Event();
    if($isSaved == 0) {
        $database->setEvent($timestamp, 0, $profil->getId(), $meOrganisator, $organisator, $enrollSystem, $mainTitle, $subsciption, $place, $accessPost, $typePost);
    }else{
        $database->updateEvent($timestamp, 0, $meOrganisator, $organisator, $enrollSystem, $mainTitle, $subsciption, $place, $accessPost, $typePost);
    }
}
if($isSaved != 0){
    $save = "Upravit";
}
return include_once("views/calendar/new-html.php");