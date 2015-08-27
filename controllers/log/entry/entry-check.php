<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 24.08.2015
 * Time: 14:44
 */
$err = array();
$title = "";
$headline = 'Nový článek';
$sportID = "";
$otherSport = "";
$entry = "";
$shared = 0;
$num_entry = 0;
$link = "";
if(isset($_POST['title'])){
    $title = $_POST['title'];
    if($title == ""){
        $err[] = "Není vyplněný nadpis!";
    }elseif(strlen($title) > 255){
        $err[] = "Příliš dlouhý nadpis!";
    }else{
        $headline = $title;
    }
    $sportID = $_POST['sport'];
    if($sportID == "other"){
        $otherSport = $_POST['otherSport'];
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
        $num_entry = $_POST['num_entry'];
    }
    $entry = $_POST['entry'];
    if($_POST['shared'] == 0){
        $shared = $_POST['submit'];
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
            $link = "<a href='index.php?page=entry&id=$num_entry'>Odkaz na článek</a>";
            $err[] = "Úspěšně uloženo a sdíleno!";
        }else{
            $err[] = "Úspěšně uloženo!";
            $link = "Tento článek ještě nebyl sdílený";
        }
    }
};