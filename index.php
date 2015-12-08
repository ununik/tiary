<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 9:39
 */
session_start();
function __autoload($name){
    include_once("models/Classes/$name.class.php");
}
$html = new Html();
$html->addCss("<link rel='stylesheet' href='views/css/page.css' type='text/css' media='screen'/>");
$html->addCss("<link rel='stylesheet' href='views/css/page_mobil.css' type='text/css' media='handheld, only screen and (max-device-width: 1023px)'/>");
$html->addCss("<link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,latin-ext,greek,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>");
$html->addScript("<script src='js/tinymce/js/tinymce/tinymce.min.js'></script>");
$html->addScript("<script src='js/basicPage.js'></script>");
$html->addScript("<script src='js/ajax.js'></script>");
$html->addScript("<script src='js/calendar.js'></script>");
$html->addScript("<script src='js/training.js'></script>");
$html->addScript("<script src='js/jquery-1.11.3.min.js'></script>");


header('Content-type: text/html; charset=utf-8');

    include_once("models/function.php");
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "home";
    }
if(!isset($_SESSION['tiary']['log']) || $_SESSION['tiary']['log'] !== true) {
    include("controllers/unlog/navigation.php");
    $html->setContent(include("controllers/unlog/$page.php"));
    include("controllers/unlog/header/header.php");
}else{
    include("controllers/log/header/header.php");
    include("controllers/log/navigation.php");
    $html->setContent(include("controllers/log/$page.php"));
}

print include_once('views/page.php');