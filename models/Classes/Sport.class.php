<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 24.08.2015
 * Time: 9:50
 */
class Sport extends Connection
{
    public function getAllSportsCZ(){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `sport`");
        $result->execute(array());
        $sport = $result->fetchAll();
        return $sport;
    }
    public function checkSport($cz){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `sport` WHERE `cz` = ?");
        $result->execute(array($cz));
        $sport = $result->fetch();
        if(isset($sport['id'])){
            return $sport['id'];
        }else{
            return 0;
        }
    }
    public function setNewSport($cz){
        $db = parent::connect();
        $result = $db->prepare("INSERT INTO `sport`(`cz`) VALUES ( ? )");
        $result->execute(array($cz));
        return $db->lastInsertId();
    }
}