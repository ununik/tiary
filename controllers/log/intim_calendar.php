<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:54
 */
if($profil->getGender() != "f"){
    return '<h3>Pro užívání této funkce musíte mít v profilu označené, že jste žena!';
}
$date = date("j. n. Y");
$temperature = "36.0";
$err = array();
$blood = 0;

if(isset($_POST['date'])){
    /**
     * DATUM
     */
    $time = $_POST['date'];
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
    }

    $temperature = $_POST['temperature'];
    $temperature = str_replace(",", ".", $temperature);
    $temperature = explode(".", $temperature);
    if(!isset($temperature[1])){
        $temperature[1] = "0";
    }
    if(strlen($temperature[0]) > 2){
        $temperature[1] = substr($temperature[0], 2, 2);
        $temperature[0] = substr($temperature[0], 0, 2);
    }elseif(strlen($temperature[0]) < 2){
       $err[] =  "Špatný formát teploty (TT.t)!";
    }
    $temperature = $temperature[0].'.'.$temperature[1];
    $timestamp = strtotime($date);

    $blood = $_POST['blood'];

}

$blood = include_once('controllers/log/intim/blood.php');
$intimCalendarContainer = include_once('views/intim_calendar/calendar.php');
return $intimCalendarContainer;