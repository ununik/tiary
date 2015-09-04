<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 10:11
 */
class Entry extends Connection
{
    protected $lastId;
    public function newEntry($author, $title, $sport, $text, $shared){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `entry`(`timestamp`, `author`, `title`, `sport`, `text`, `shared`) VALUES ( ?, ?, ?, ?, ?, ?)");
        $result->execute(array($timestamp, $author, $title, $sport, $text, $shared));
        $this->lastId = $db->lastInsertId();
    }
    public function lastId(){
        return $this->lastId;
    }
    public function updateEntry($id, $author, $title, $sport, $text, $shared){
        $db = parent::connect();
        $result = $db->prepare("UPDATE `entry` SET `title`= ? ,`sport`= ? ,`text`= ? , `shared`= ? WHERE (`author` = ? && `id` = ?)");
        $result->execute(array($title, $sport, $text, $shared, $author, $id));
    }
    public function showAdminEntries($author){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `entry` WHERE `author` = ? ORDER BY `timestamp` DESC");
        $result->execute(array($author));
        $entry = $result->fetchAll();
        return $entry;
    }
    public function showEntries($author){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `entry` WHERE `author` = ? && `shared`=1 ORDER BY `timestamp` DESC");
        $result->execute(array($author));
        $entry = $result->fetchAll();
        return $entry;
    }
    public function showAdminEntry($id, $author){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `entry` WHERE (`author` = ? && `id` = ?) ");
        $result->execute(array($author, $id));
        $entry = $result->fetch();

        return $entry;
    }
    public function showEntry($id){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `entry` WHERE `id` = ? && shared = 1 ");
        $result->execute(array($id));
        $entry = $result->fetch();

        return $entry;
    }

    public function showAllFriendsEntries($authors){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `entry` WHERE `author` IN (?) ORDER BY `timestamp` DESC");
        $result->execute(array(implode (", ",$authors)));
        $entry = $result->fetchAll();
        return $entry;
    }

}