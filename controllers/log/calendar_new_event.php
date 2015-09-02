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
$organisator = "";
$subsciption = "";
if(isset($_POST['title'])){
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
    }

    $subsciption = $_POST['subsciption'];
}
return include_once("views/calendar/new-html.php");