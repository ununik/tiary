<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 11:08
 */
class LikesAndDislikesEntry extends Connection
{
    public function newlike($like, $author, $entry){
        $db = parent::connect();
        $result = $db->prepare("INSERT INTO `likesdislikes_entry`(`likes`, `author`, `entry`) VALUES (?, ?, ?)");
        $result->execute(array($like, $author, $entry));
    }

    public function numOfLikes($entry){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `likesdislikes_entry` WHERE (`entry` = ? && `likes` = 1)");
        $result->execute(array($entry));
        $num = $result->rowCount();
        return $num;
    }

    public function numOfDislike($entry){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `likesdislikes_entry` WHERE (`entry` = ? && `likes` = 0)");
        $result->execute(array($entry));
        $num = $result->rowCount();
        return $num;
    }
    public function checkLikedEntry($author, $entry){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `likesdislikes_entry` WHERE author = ? && entry = ? ");
        $result->execute(array($author, $entry));
        $like = $result->fetch();
        if(isset($like['id'])){
            if($like['likes'] == 1){
                return "+";
            }else{
                return "-";
            };
        } else{
            return false;
        }
    }
}