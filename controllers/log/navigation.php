<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 14:04
 */
$navContainer = "<div id='navHeadline' onclick='showANDhideMenu(this)'>MENU $headerName<span class='headerNotice'  onclick='getUnseenNotices()'>$headerNotice</span></div>
        <a href='index.php?page=home'>Domů</a>
        <a href='index.php?page=profil'>Profil</a>
        <a href='index.php?page=calendar'>Kalendář</a>";
if($profil->getGender() == "f"){
      $navContainer .= "<a href='index.php?page=intim_calendar'>Intimní kalendář</a>";
}

$navContainer .= "<a href='index.php?page=entries'>Mé články</a>
        <a href='index.php?page=contacts'>Kontakty</a>
        <a href='index.php?page=logout'>Odhlásit se</a>
        ";

return $navContainer;