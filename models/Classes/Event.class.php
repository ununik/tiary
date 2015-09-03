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
}