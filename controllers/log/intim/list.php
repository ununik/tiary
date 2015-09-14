<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 14.09.2015
 * Time: 16:05
 */
$diar = new IntimCalendar();
$list = "";
$all = $diar->getAllEntry($profil->getId());
foreach($all as $calendar){
    $datelist = date("j. n. Y", $calendar['date']);
    $list .= "{$datelist} - teplota: {$calendar['temperature']}<br>";
}
return $list;