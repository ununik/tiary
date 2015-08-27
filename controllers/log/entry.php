<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 14:40
 */
$entryDB = new Entry();
$entry = $entryDB->showEntry($_GET['id']);
$date = date('j. n. Y', $entry['timestamp']);
$author = new Profil($entry['author']);
if($author->getId() == $profil->getId()){
    $update = "<a href='index.php?page=entries&entry={$entry['id']}'>upravit</a>";
}else{
    $update = "";
}
$like = include_once("controllers/log/entry/entry-like.php");
$comment = include_once("controllers/log/entry/entry-comment.php");
return include_once("views/entry/entry-html.php");