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
     return $from.' - '.$to;
    }
}