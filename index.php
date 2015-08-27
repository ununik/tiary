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
header('Content-type: text/html; charset=utf-8');

    include_once("models/function.php");
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "home";
    }
if(!isset($_SESSION['tiary']['log']) || $_SESSION['tiary']['log'] !== true) {
    $navigation = include_once("controllers/unlog/navigation.php");
    $contetnt = include_once("controllers/unlog/$page.php");
}else{
    $navigation = include_once("controllers/log/navigation.php");
    $contetnt = include_once("controllers/log/$page.php");
}
print include_once('views/page.php');