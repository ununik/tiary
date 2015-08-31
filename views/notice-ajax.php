<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 12:20
 */
$container = "";
foreach($notices as $notice){
    $container .= "<div>{$notice}</div>";
}

return $container;