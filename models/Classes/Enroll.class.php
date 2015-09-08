<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:27
 */
class Enroll extends Connection
{
    public function setEnroll($event, $gender, $name, $email, $age, $club, $adress, $category, $message){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `enroll`(`event`, `timestamp`, `gender`, `name`, `email`, `age`, `club`, `adress`, `category`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result->execute(array($event, $timestamp, $gender, $name, $email, $age, $club, $adress, $category, $message));
        $this->lastId = $db->lastInsertId();
        return $this->lastId;
    }
}