<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 16.09.2015
 * Time: 10:51
 */
session_start();
function __autoload($name){
    include_once("../../../models/Classes/$name.class.php");
}
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$diary = new IntimCalendar();
$date = date("j. n. Y");
$temperature = "36.0";
$err = array();
$blood = 0;
$menstruace = 0;
$timestampEntry = 0;
$temperatureSelect = $diary->getLastTemperatur($profil->getId());
$temperatureINPUT = 0;
$saved = 0;

if(isset($_GET['date'])){
    /**
     * DATUM
     */
    $time = $_GET['date'];
    $time = str_replace(",", ".", $time);
    $time = str_replace("-", ".", $time);
    $time = explode(".", $time);
    if(!isset($time[0]) || !isset($time[1]) || !isset($time[2])){
        $err[] =  "Špatný formát datumu (DD. MM. RRRR)!";
    }else{
        $time[0] = trim ($time[0]);
        $time[1] = trim ($time[1]);
        $time[2] = trim ($time[2]);
        $date = $time[0] . ". " . $time[1] . ". " .$time[2];


        $timestampEntry = mktime(0, 0, 0, $time[1], $time[0], $time[2]);
    }

    $temperaturePOST = $_GET['temperatureINPUT'];
    $temperatureINPUT = $_GET['temperatureINPUT'];
    $temperatureSelect = $_GET['temperatureSelect'];
    if($_GET['temperatureSelect'] != "other"){
        $temperaturePOST = $_GET['temperatureSelect'];
    }
    $temperaturePOST = str_replace(",", ".", $temperaturePOST);
    $temperaturePOST = explode(".", $temperaturePOST);
    if(!isset($temperaturePOST[1])){
        $temperaturePOST[1] = "0";
    }
    if(strlen($temperaturePOST[0]) > 2){
        $temperaturePOST[1] = substr($temperaturePOST[0], 2, 2);
        $temperaturePOST[0] = substr($temperaturePOST[0], 0, 2);
    }elseif(strlen($temperaturePOST[0]) < 2){
        $err[] =  "Špatný formát teploty (TT.t)!";
    }
    $temperaturePOST = $temperaturePOST[0].'.'.$temperaturePOST[1];


    if(isset($_GET['menstruace'])){
        $menstruace = 1;
        $blood = $_GET['blood'];
    }
    if(empty($err)){
        if(($diary->checkDay($profil->getId(), $timestampEntry)) == true) {
            $diary->newEntry($profil->getId(), $timestampEntry, $temperaturePOST, $menstruace, $blood);
            $err[] = "Záznam uložen";
            $saved = 1;
        }else{
            $err[] = "Tento den již záznam má.";
        }
    }
}

$temperatureSelect = include_once('../../../controllers/log/intim/temperature.php');
$blood = include_once('../../../controllers/log/intim/blood.php');


$intimCalendarContainer = include_once('../../../views/intim_calendar/input_new.php');

print $intimCalendarContainer;
