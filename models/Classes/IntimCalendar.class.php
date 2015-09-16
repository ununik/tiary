<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 14.09.2015
 * Time: 15:17
 */
class IntimCalendar extends Connection
{
    public function newEntry($user, $date, $temperatur, $menstruace, $blood){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `intim_calendar`(`user`, `timestamp`, `date`, `temperature`, `menstruace`, `blood`) VALUES (?, ?, ?, ?, ?, ?)");
        $result->execute(array($user, $timestamp, $date, $temperatur, $menstruace, $blood));
    }
    public function checkDay($user, $date){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `intim_calendar` WHERE (`user` = ? && `date` = ?) ");
        $result->execute(array($user, $date));
        $entry = $result->fetchAll();
        if(isset($entry[0])){
            return false;
        } else{
            return true;
        }
    }

    public function getAllEntry($user){
        $db = parent::connect();
        $yearago = strtotime('-1 years');
        $result = $db->prepare("SELECT * FROM `intim_calendar` WHERE `user` = ? && `date` > ? ORDER BY date");
        $result->execute(array($user, $yearago));
        $entry = $result->fetchAll();
        return $entry;
    }

    public function getLastTemperatur($user){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `intim_calendar` WHERE `user` = ? ORDER BY id DESC LIMIT 1");
        $result->execute(array($user));
        $entry = $result->fetch();
        return $entry['temperature'];
    }
}