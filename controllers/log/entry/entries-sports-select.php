<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 24.08.2015
 * Time: 9:46
 */

$sports = new Sport();
$sports = $sports->getAllSportsCZ();
return include_once("views/entry/sport-list.php");