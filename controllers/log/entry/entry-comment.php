<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 16:18
 */
$saved = "";
$newComment = new CommentsEntry();
if(isset($_POST['comment']) && $_POST['comment'] != ""){
    $commentSafe = htmlspecialchars($_POST['comment']);
    $newComment->newComment($_GET['id'], $profil->getId(), $commentSafe);
    $saved = "Váš komentář byl přidán.";
}
$allComments = $newComment->allComments($_GET['id']);
$commentsInBox = include("views/entry/comment-html.php");
return include_once("views/entry/commentsBox.php");