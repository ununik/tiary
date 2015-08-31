<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 15:25
 */
$messageProfil = new Profil($_POST['id']);
return include_once("views/message/new.php");