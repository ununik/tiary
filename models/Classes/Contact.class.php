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
    public function getAllfriends($me){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `relationship` WHERE  (user1 = ? || user2 = ?) && friends = 1");
        $result->execute(array($me, $me));
        $users = $result->fetchAll();
        $friends = array();
        foreach($users as $user){

            if($user['user1'] == $me){
                $userid = $user['user2'];
            }else{
                $userid = $user['user1'];
            }
            $result = $db->prepare("SELECT * FROM `user` WHERE id = ? ");
            $result->execute(array($userid));
            $friends[] = $result->fetch();
        }
        return $friends;
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
                if($relationship['user1'] == $me){
                    return "waiting";
                }else{
                    return "check";
                }
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
        $user = new Profil();
        $name = $user->getName();
        $notice = "<a href='index.php?page=profil&profil=$me'>Máte novou žádost o přátelstí od $name</a>";
        $result = $db->prepare("INSERT INTO `relationship`(`user1`, `user2`, `timestamp`, `friends`) VALUES (?, ?, ?, ?)");
        $result->execute(array($me, $user2, $timestamp, 0));
            $result = $db->prepare("INSERT INTO `notice`(`title`, `timestamp`, `user`) VALUES (?, ?, ?)");
            $result->execute(array($notice, $timestamp, $user2));
    }
    public function confirmRelationship($me, $user2){
        $db = parent::connect();
        $result = $db->prepare("UPDATE `relationship` SET `friends` = 1 WHERE (user1 = ?  && user2 = ?) || (user1 = ? && user2 = ?)");
        $result->execute(array($me, $user2, $user2, $me));
    }
    public function deleteRelationship($me, $user2){
        $db = parent::connect();
        $result = $db->prepare("DELETE FROM `relationship` WHERE (user1 = ?  && user2 = ?) || (user1 = ? && user2 = ?)");
        $result->execute(array($me, $user2, $user2, $me));
    }
}