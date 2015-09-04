<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 11:09
 */
$container = "<h1>Kalendář</h1>";
$container .= "<table class='calendar_week'><th colspan='2'>{$days[0]['date']}</th><th>Událost</th>";
foreach($days as $day){
    $container .= "<tr><td>{$day['date']}</td><td>{$day['name']}</td><td>";
    foreach($day['events'] as $event){
        $container .= "<div>$event</div>";
    }
    $container .= "</td></tr>";
}
$container .= "</table>";


return $container;