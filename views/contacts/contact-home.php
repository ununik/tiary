<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 14:07
 */
$container = "<h1>Kontakty</h1>";
$container .= "<div  class='textInput_div'><form action='' method='get'><input type='text' value='contacts' name='page' hidden>
                <input type='text' name='search' value='$search'><input type='submit' value='hledat'   class='submit'>
                </form></div>
                ";
foreach($users as $user){
    $userprofil = new Profil($user['id']);
    $container .=  "<div><a href='index.php?page=profil&profil={$user['id']}'>{$userprofil->getName()}</a></div>";
}

return $container;