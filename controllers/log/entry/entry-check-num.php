<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 13:59
 */
$entryDB = new Entry();
$entryData = $entryDB->showAdminEntry($_GET['entry'], $profil->getId());
$err = array();
$title = $entryData['title'];
$headline = $entryData['title'];
$sportID = $entryData['sport'];
$otherSport = "";
$entry = $entryData['text'];
$shared = $entryData['shared'];
$num_entry = $entryData['id'];
if(isset($_POST['title'])){
    $title = safeText($_POST['title']);
    if($title == ""){
        $err[] = "Není vyplněný nadpis!";
    }elseif(strlen($title) > 255){
        $err[] = "Příliš dlouhý nadpis!";
    }else{
        $headline = $title;
    }
    $sportID = safeText($_POST['sport']);
    if($sportID == "other"){
        $otherSport = safeText($_POST['otherSport']);
        if(strlen($title) > 255){
            $err[] = "Příliš dlouhý název sportu!";
        }else{
            $otherSport = trim(strtolower ($otherSport));
            $newSport = new Sport();
            if($newSport->checkSport($otherSport) == 0){
                $sportID = $newSport->setNewSport($otherSport);
            }else{
                $sportID = $newSport->checkSport($otherSport);
            }

        }
    }
    if($_POST['num_entry'] != 0){
        $num_entry = safeText($_POST['num_entry']);
    }
    $entry = $_POST['entry'];
    if($_POST['shared'] == 0){
        $shared = safeText($_POST['submit']);
    } else{
        $shared = 1;
    }

    if(empty($err)){
        $database = new Entry();
        if($num_entry == 0) {
            $database->newEntry($profil->getId(), $title, $sportID, $entry, $shared);

            $num_entry = $database->lastId();
        } else{
            $database->updateEntry($num_entry, $profil->getId(), $title, $sportID, $entry, $shared);

        }
        if($shared == 1){
            $err[] = "Úspěšně uloženo a sdíleno!";
        }else{
            $err[] = "Úspěšně uloženo!";
        }
    }
};
if($shared == 1){
    $link = "<a href='index.php?page=entry&id=$num_entry'>Odkaz na článek</a>";
}else{
    $link = "Tento článek ještě nebyl sdílený.";
}