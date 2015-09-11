<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:02
 */
$genderContainer = "<option value='' selected>Neuvedeno</option>";
$genderContainer .= "<option value='m'";
if((isset($_POST['gender']) && $_POST['gender']=="m") || $profil->getGender()=="m"){
    $genderContainer .= " selected ";
}
$genderContainer .= ">Muž</option>";
$genderContainer .= "<option value='f'";
if((isset($_POST['gender']) && $_POST['gender']=="f") || $profil->getGender()=="f"){
    $genderContainer .= " selected ";
}
$genderContainer .= ">Žena</option>";

return $genderContainer;