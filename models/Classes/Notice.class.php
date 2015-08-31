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
            $notices[] = $notice['title'];
        }
        return $notices;
    }
}