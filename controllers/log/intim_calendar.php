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



$intimCalendarContainer = include_once('views/intim_calendar/calendar.php');
return $intimCalendarContainer;