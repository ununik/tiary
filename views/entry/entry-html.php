<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 15:11
 */
$container = "<div class='content'><h1>{$entry['title']}</h1>";
$container .= "<div>$update</div>";
$container .= "<div>Autor: {$author->getName()}</div>";
$container .= "<div>Datum: $date</div>";
$container .= "<div class='entry_text'>{$entry['text']}</div>";
$container .= "<div>$like</div>";
$container .= "<div>$comment</div>";

$container .= "</div>";


return $container;