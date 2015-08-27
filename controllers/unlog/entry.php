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
$update = "";
$comment = "Nemůžete přidat komentář, protože nejste registrovaný uživatel.";
return include_once("views/entry/entry-html.php");