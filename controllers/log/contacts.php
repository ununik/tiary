<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 13:46
 */
$search = "";
$contact = new Contact();
if(isset($_GET['search'])){
    $search = safeText($_GET['search']);
    $users = $contact->getAllWithoutMeSearch($search, $profil->getId());
}else{
    $users = $contact->getAllfriends($profil->getId());
}

return include_once("views/contacts/contact-home.php");