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

/**
 * Mail
 */
if($profil->getEmail() != false) {
    $container .= "<div><strong>Email: </strong>{$profil->getEmail()}</div>";
}

/**
 * Kluby
 */
if($club != "" && $club != '<ul><li></li></ul>') {
    $container .= "<div class='popis_profil'><strong>Klub(y):</strong><br>
                $club</div>";
}

/**
 * Jak dlouho je uživatelem
 */
$container .= "<div><strong>Jak dlouho jsem na Tiary: </strong>{$profil->getHowLongUser()}</div>";

if($entries != "") {
    $container .= "<table class='profil_table'><tr><td><strong>Články: </strong></td><td>$entries</td></tr></table>";
}


if($profil->isMyAccount()){
    $container .= "<a href='index.php?page=profil_update'>Upravit profil</a>";
}
return $container;