<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 14:50
 */

$container = "<h2>Nejnovější články</h2>";
foreach($allEntries as $entry){
    $container .= "<h3>{$entry['title']}</h3>";
    $container .= "<div class='content'>{$entry['text']}</div>";
}

return $container;