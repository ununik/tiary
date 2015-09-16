<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 15.09.2015
 * Time: 14:04
 */
class ProfileImage extends Connection
{
    public function getNumForNextImg(){
        $db = parent::connect();
        $result = $db->prepare("SELECT COUNT(*) FROM profile_image;");
        $result->execute(array());
        $user = $result->fetch();
        $user = $user[0] + 1;
        return $user;
    }

    public function getAllUserAvatars($user){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `profile_image` WHERE user = ? ");
        $result->execute(array($user));
        $images = $result->fetchAll();
        return $images;
    }

    public function setNewImg($name, $size, $user, $type){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `profile_image`(`name`, `timestamp`, `size`, `user`, `type`) VALUES (?, ?, ?, ?, ?)");
        $result->execute(array($name, $timestamp, $size, $user, $type));
    }
}