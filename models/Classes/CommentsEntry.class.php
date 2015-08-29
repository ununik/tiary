<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 17:00
 */
class CommentsEntry extends Connection
{
    public function newComment($entry, $author, $text, $entryAuthor, $notice){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `comment_entry`(`entry`, `timestamp`, `author`, `text`) VALUES (?, ?, ?, ?)");
        $result->execute(array($entry, $timestamp, $author, $text));

        $result = $db->prepare("INSERT INTO `notice`(`title`, `timestamp`, `user`) VALUES (?, ?, ?)");
        $result->execute(array($notice, $timestamp, $entryAuthor));
    }

    public function allComments($entry){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `comment_entry` WHERE `entry` = ? ORDER BY `timestamp` DESC");
        $result->execute(array($entry));
        $comments = $result->fetchAll();
        return $comments;
    }
    public function numOfComments($entry){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `comment_entry` WHERE `entry` = ? ORDER BY `timestamp` DESC");
        $result->execute(array($entry));
        $num = $result->rowCount();
        return $num;
    }
}