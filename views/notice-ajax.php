<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 12:20
 */
$container = "<div onclick='getUnseenNotices()' class='calendar_js_close'>x</div>";
foreach($notices as $notice){
    $container .= "<div>{$notice}</div>";
}

return $container;