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
$title = "";
$meOrganisator = 1;
$organisator = "";
if(isset($_POST['title'])){
    if(isset($_POST['meOrganisator'])) {
        $meOrganisator = $_POST['meOrganisator'];
    }else{
        $meOrganisator = 0;
    }
}
return include_once("views/calendar/new-html.php");