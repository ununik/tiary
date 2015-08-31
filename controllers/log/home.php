<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 13:47
 */
$friends = new Contact();
$authorsAll = $friends->getAllfriends($profil->getId());
$authors = array();
foreach($authorsAll as $author){
    $authors[] =  $author['id'];
}
$allEntries = new Entry();
$allEntries = $allEntries->showAllFriendsEntries($authors);
return include_once("views/homepage/log.php");