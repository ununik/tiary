<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 03.09.2015
 * Time: 13:08
 */
$container = "<h1>$mainTitle</h1>";
if($update == 1){
    $container .= "<a href='index.php?page=calendar_update_event&id={$event['id']}'>Upravit</a>";

}
$container .= "<table class='eventTable'>";
$container .= "<tr><td class='eventTableDescription'>Datum:</td><td>$date</td></tr>";
$container .= "<tr><td class='eventTableDescription'>Typ události:</td><td>$type</td></tr>";
if($subscription != "") {
    $container .= "<tr><td class='eventTableDescription'>Popis:</td><td>$subscription</td></tr>";
}
if($place != "") {
    $container .= "<tr><td class='eventTableDescription'>Místo:</td><td>$place</td></tr>";
}
if($organisator != "") {
    $container .= "<tr><td class='eventTableDescription'>Pořadatel:</td><td>$organisator</td></tr>";
}

$container.= "</table>";


return $container;