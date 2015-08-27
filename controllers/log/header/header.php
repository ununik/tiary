<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 27.08.2015
 * Time: 14:33
 */
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$head = "";
$headerName = "<span class='headerName'>{$profil->getName()}</span>";
$head .= $headerName;

return $head;