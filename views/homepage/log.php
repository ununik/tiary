<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 14:50
 */

$container = "<h1>Nejnovější články</h1>";
foreach($allEntries as $entry){
    $container .= "<a href='index.php?page=entry&id={$entry['id']}' class='entries_view_all'><h2>{$entry['title']}</h2>";
        $firstParagraph = explode("</p>", $entry['text']);
        $firstParagraph = $firstParagraph[0] . "</p>";
    $container .= "<div class='entry_text'>$firstParagraph</div></a>";
}

return $container;