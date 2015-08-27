<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 15:24
 */

$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
if(isset($_GET['profil']) && $_GET['profil']!=$profil->getId()){
    $profil = new Profil($_GET['profil']);
}
$clubs = $profil->getClubList();
$club = "<ul>";
foreach ($clubs as $club_one){
    $club .= "<li>$club_one</li>";
}
$club .= "</ul>";

$entr = new Entry();
$allEntries = $entr->showEntries($profil->getId());
$entries = "";
foreach($allEntries as $oneEntry){
    $date = date('j. n. Y', $oneEntry['timestamp']);
    $comments = new CommentsEntry();
    $numComments = $comments->numOfComments($oneEntry['id']);
    $entries .= "<a href='index.php?page=entry&id={$oneEntry['id']}'>{$oneEntry['title']} ($date)</a><br>
                 <div>Počet komentářů: $numComments</div>";
}
return include_once("views/profil/profil-html.php");