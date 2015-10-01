<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:27
 */
class Event extends Connection
{
    public function getEvents($from, $to){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event` WHERE (timestamp1 >= ? && timestamp1 < ?) ORDER BY timestamp1");
        $result->execute(array($from, $to));
        $events = $result->fetchAll();
        return $events;
    }
    public function getEvent($id){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event` WHERE id = ?");
        $result->execute(array($id));
        $event = $result->fetch();
        return $event;
    }

    public function setEvent($date1, $date2 = 0, $author, $idOrganisator = 0, $organisator = "", $enroll = 0, $title = "", $subscription = "", $place = "", $access = "all", $type = "competition"){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `event`(`timestamp1`, `timestamp2`, `author`, `id_organisator`, `organisator`, `enroll`, `title`, `subscription`, `place`, `timestampOfCreation`, `access`, `type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result->execute(array($date1, $date2, $author, $idOrganisator, $organisator, $enroll, $title, $subscription, $place, $timestamp, $access, $type));
        $this->lastId = $db->lastInsertId();
        return $this->lastId;
    }
    public function updateEvent($date1, $date2 = 0, $idOrganisator = 0, $organisator = "", $enroll = 0, $title = "", $subscription = "", $place = "", $access = "all", $type = "competition", $id = 0){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("UPDATE `event` SET `timestamp1`=?,`timestamp2`=?,`id_organisator`=?,`organisator`=?,`enroll`=?,`title`=?,`subscription`=?,`place`=?,`access`=?,`type`=? WHERE id = ?");
        $result->execute(array($date1, $date2, $idOrganisator, $organisator, $enroll, $title, $subscription, $place, $access, $type, $id));
    }
    public function setEnroll($author, $event, $email){
    $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `event_enroll`(`author`, `event`, `starttimestamp`, `gender`, `name`, `email`, `age`, `club`, `adress`, `category`, `email_author`) VALUES (?, ?, ?, 1, 1, 1, 1, 1, 0, ?, ?)");
        $result->execute(array($author, $event, $timestamp, "", $email));
    }
    public function updateEnroll($author, $event, $time, $gender, $name, $email, $age, $club, $adress, $category, $emailAuthor){
    $db = parent::connect();
        $result = $db->prepare("UPDATE `event_enroll` SET `starttimestamp`=?,`gender`=?,`name`=?,`email`=?,`age`=?,`club`=?,`adress`=?,`category`=? , `email_author` = ? WHERE `author`=? &&`event`=?");
        $result->execute(array($time, $gender, $name, $email, $age, $club, $adress, $category, $emailAuthor, $author, $event));
        return "test";
    }
    public function getEnroll($event, $author){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event_enroll` WHERE event = ? && author = ?");
        $result->execute(array($event, $author));
        $event = $result->fetch();
        return $event;
    }
    public function getEnrollMail($event){
        $db = parent::connect();
        $result = $db->prepare("SELECT `mail` FROM `event_enroll` WHERE event = ? ");
        $result->execute(array($event));
        $event = $result->fetch();
        return $event['email_enroll'];
    }

    public function getAccessOptions(){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event_access`");
        $result->execute(array());
        $event = $result->fetchAll();
        return $event;
    }

    public function getTypeOptions(){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event_type`");
        $result->execute(array());
        $event = $result->fetchAll();
        return $event;
    }

    public function getCategoriesOptions($sport){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event_category` WHERE sport = ? ORDER BY age, gender");
        $result->execute(array($sport));
        $event = $result->fetchAll();
        return $event;
    }

    public function getType($type){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `event_type` WHERE `title` = ?");
        $result->execute(array($type));
        $entry = $result->fetch();

        return $entry;
    }
}