<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 11:20
 */
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$content = "";
$entries = new Entry();
$entries = $entries->showAdminEntries($profil->getId());
foreach($entries as $entry){
    $headline = $entry['title'];
    $id = $entry['id'];
    $firstParagraph = explode("</p>", $entry['text']);
    $firstParagraph = $firstParagraph[0] . "</p>";
    $content .= include("views/entry/all-entries.php");
}
return $content;