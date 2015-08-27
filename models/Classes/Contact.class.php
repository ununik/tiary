<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 14:18
 */
class Contact extends Connection
{
    public function getAll(){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `user` WHERE  validate = 1 ORDER BY firstname ");
        $result->execute(array());
        $user = $result->fetchAll();
        return $user;
    }
    public function getAllWithoutMe($me){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `user` WHERE id != ? && validate = 1 ORDER BY firstname ");
        $result->execute(array($me));
        $user = $result->fetchAll();
        return $user;
    }
    public function getAllWithoutMeSearch($search, $me){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `user` WHERE (id != ? && validate = 1 &&
                              ((firstname LIKE '%$search%') || (middlename LIKE '%$search%')|| (lastname LIKE '%$search%') || (login LIKE '%$search%') || (email LIKE '%$search%'))
                              ) ORDER BY firstname ");
        $result->execute(array($me));
        $user = $result->fetchAll();
        return $user;
    }
    public function isRelationship($me, $user2){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `relationship` WHERE (user1 = ?  && user2 = ?) || (user1 = ? && user2 = ?)");
        $result->execute(array($me, $user2, $user2, $me));
        $relationship = $result->fetch();
        if(isset($relationship['id'])){
            if($relationship['friends'] != 1){
                return "waiting";
            }else{
                return true;
            }
        } else{
            return false;
        }
    }
    public function setNewRelationship($me, $user2){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `relationship`(`user1`, `user2`, `timestamp`, `friends`) VALUES (?, ?, ?, ?)");
        $result->execute(array($me, $user2, $timestamp, 0));
    }
}