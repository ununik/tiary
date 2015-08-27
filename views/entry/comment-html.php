<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 17:15
 */
$commentsBOXES = "";
foreach($allComments as $allComment){
    $authorComments = new Profil($allComment['author']);
    $dateComments = date('j. n. Y', $allComment['timestamp']);
    $textComments = $allComment['text'];

    $commentsBOXES .= "<div><a href='index.php?page=profil&profil={$authorComments->getId()}'>{$authorComments->getName()}</a></div>";
    $commentsBOXES .= "<div>$dateComments</div>";
    $commentsBOXES .= "<div>$textComments</div>";
}
return $commentsBOXES;