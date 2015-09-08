<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 15:26
 */
/**
 * Jmeno
 */
$container = "<h1>{$profil->getName()}</h1>";

/**
 * Vztah
 */
    $container .= "<div>$relationships</div>";
    
    $container .= "<table class='profil_tables'>";

/**
 * Mail
 */
if($profil->getEmail() != false) {
    $container .= "<tr><td class='profil_headline'>Email:</td><td>{$profil->getEmail()}</td></tr>";
}

/**
 * Tel
 */
if($profil->getTel() != false) {
    $container .= "<tr><td class='profil_headline'>Telefon:</td><td>{$profil->getTel()}</td></tr>";
}

/**
 * Kluby
 */
if($club != "" && $club != '<ul><li></li></ul>') {
    $container .= "<tr><td class='profil_headline'>Klub(y):</td><td>
                $club</td></tr>";
}

/**
 * Jak dlouho je uživatelem
 */
$container .= "<tr><td class='profil_headline'>Jak dlouho jsem na Tiary:</td><td>{$profil->getHowLongUser()}</td></tr>";

if($entries != "") {
    $container .= "<tr><td class='profil_headline'>Články:</td><td>$entries</td></tr></table>";
}

$container .= "</table>";

if($profil->isMyAccount()){
    $container .= "<a href='index.php?page=profil_update'>Upravit profil</a>";
}
return $container;