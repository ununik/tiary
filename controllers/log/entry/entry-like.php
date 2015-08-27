<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 11:13
 */
$likeANDdislike = new LikesAndDislikesEntry();
$liking = $likeANDdislike->checkLikedEntry($profil->getId(), $_GET['id']);
if($liking === false) {
    if (isset($_POST['like'])) {
        $likeANDdislike->newlike($_POST['like'], $profil->getId(), $_GET['id']);
    }
}
$liking = $likeANDdislike->checkLikedEntry($profil->getId(), $_GET['id']);

if($liking != false){
    $disable = 'disabled';
    $liking = "Tomuto článku jste dal $liking";
}else{
    $disable = '';
    $liking = "";
}
$likes = $likeANDdislike->numOfLikes($_GET['id']);
$dislikes = $likeANDdislike->numOfDislike($_GET['id']);
return include_once("views/entry/likesAndDislakes-html.php");