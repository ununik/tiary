<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$container = "<h1>Kalendář</h1>";
$container .= "<a href='index.php?page=calendar&term=week&date=$previousDate'>Předchozí týden</a><a href='index.php?page=calendar&term=week&date=$nextDate'>Následující týden</a>";
$container .= "<table class='calendar_week'><th colspan='2' id='calendar_week_header_date'>{$days[0]['date']} - {$days[7]['date']}</th><th>Událost</th>";
foreach($days as $day){
    $container .= "<tr><td class='calendar_week_date'>{$day['date']}</td><td  class='calendar_week_dayname'>{$day['name']}</td><td class='calendar_week_event_td'>";
    foreach($day['events'] as $event){
        $container .= "<div>$event</div>";
    }
    $container .= "</td></tr>";
}
$container .= "</table>";


return $container;