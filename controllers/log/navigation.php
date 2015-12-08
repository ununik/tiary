<?php

$html->addToNavigation("<div id='navHeadline' onclick='showANDhideMenu(this)'><span class='header_menu_headline'>MENU</span> $headerName<span class='headerNotice'  onclick='getUnseenNotices()'>$headerNotice</span></div>");
$html->addToNavigation("<a href='index.php?page=home'>Domů</a>");
$html->addToNavigation("<a href='index.php?page=profil'>Profil</a>");
$html->addToNavigation("<a href='index.php?page=training_diary'>Tréninkový deník</a>");
$html->addToNavigation("<a href='index.php?page=calendar'>Kalendář</a>");
if($profil->getGender() == "f"){
	$html->addToNavigation("<a href='index.php?page=intim_calendar'>Intimní deníček</a>");
}

$html->addToNavigation("<a href='index.php?page=entries'>Mé články</a>");
$html->addToNavigation("<a href='index.php?page=contacts'>Kontakty</a>");
$html->addToNavigation("<a href='index.php?page=logout'>Odhlásit se</a>");