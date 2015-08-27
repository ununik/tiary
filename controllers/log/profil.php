<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 15:24
 */

$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$me = $profil->getId();
$relationships = "";
if(isset($_GET['profil']) && $_GET['profil']!=$profil->getId()){
    $profil = new Profil($_GET['profil']);
    $relationship = new Contact();
    if(isset($_POST['friends'])){
        if($_POST['friends'] == "new"){
            $relationship->setNewRelationship($me, $profil->getId());
        }elseif($_POST['friends'] == "check"){
            $relationship->confirmRelationship($me, $profil->getId());
        }elseif($_POST['friends'] == "delete"){
            $relationship->deleteRelationship($me, $profil->getId());
        }
    }
    $relationship = $relationship->isRelationship($me, $profil->getId());
    if($relationship === true){
        $relationships = "S tímto sportovcem se znáš. <form action='' method='post'><button name='friends' value='delete'>Zrušit přátelství</button></form>";
    }elseif($relationship === false){
        $relationships = "Zatím se neznáte. <form action='' method='post'><button name='friends' value='new'>Odeslat žádost</button></form>";
    }elseif($relationship == "waiting"){
        $relationships = "Čeká se na potvrzení od druhého sportovce.";
    }elseif($relationship == "check"){
        $relationships = "Tento sportovec se chce s tebou seznámit. <form action='' method='post'><button name='friends' value='check'>Potvrdit žádost</button></form>";
    }
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