<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 12:19
 */
session_start();
function __autoload($name){
    include_once("../../../models/Classes/$name.class.php");
}
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$notices = new Notice();
$notices = $notices->getNotice($profil->getId());

print include_once "../../../views/notice-ajax.php";