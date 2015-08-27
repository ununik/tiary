<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 13:46
 */
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$search = "";
$contact = new Contact();
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $users = $contact->getAllWithoutMeSearch($search, $profil->getId());
}else{
    $users = $contact->getAllfriends($profil->getId());
}

return include_once("views/contacts/contact-home.php");