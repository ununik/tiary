<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 24.08.2015
 * Time: 9:50
 */
class Training extends Connection
{
    public function getAllTrainingSport(){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `training_sports`");
        $result->execute(array());
        $sport = $result->fetchAll();
        return $sport;
    }
}