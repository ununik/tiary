<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 10:38
 */
class Notice extends Connection
{
    public function getNotice($user){
        $notices = array();
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `notice` WHERE user = ? && seen = 0");
        $result->execute(array($user));
        $all = $result->fetchAll();
        foreach($all as $notice){
            $notices[] = '<span onclick="seenNotice('.$notice['id'].')">'.$notice['title'].'</span>';
        }
        return $notices;
    }
    public function getNumNotice($user){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `notice` WHERE user = ? && seen = 0");
        $result->execute(array($user));
        $notices = $result->rowCount();
        return $notices;
    }

    public function seenNotice($id, $user){
        $db = parent::connect();
        $result = $db->prepare("UPDATE `notice` SET `seen`=1 WHERE id = ? && user = ?");
        $result->execute(array($id, $user));
    }
}

