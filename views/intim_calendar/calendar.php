<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:59
 */
$container = '<h1>Můj intimní deníček</h1>';
if(!empty($err)) {
    $container .= "<div id='errors'>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
if($saved == 0) {
$container .= include_once("views/intim_calendar/input_new.php");
}else{
    $container .= "graf";
}

$container .= $list;
return $container;