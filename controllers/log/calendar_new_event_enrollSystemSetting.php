<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 14:44
 */
 $OptionsAll = new Event();
$option = $OptionsAll->getEnroll($_GET['id'], $profil->getId());
$options = "";
$gender = $option['gender'];
$name = $option['name'];
$email = $option['email'];
$year = $option['age'];
$club = $option['club'];
$adress = $option['adress'];
$category = $option['category'];
$link = "";
$date = date("j. n. Y", $option['starttimestamp']);
$mailAdmin = $option['email_author'];
$event = $OptionsAll->getEvent($_GET['id']);

$categories = include_once("controllers/log/calendar/enroll-setting-category.php");

if(isset($_POST['form'])){
    if(isset($_POST['gender']) && $_POST['gender'] == 1){
        $gender = 1;
    }else{
        $gender = 0;
    }

    if(isset($_POST['name']) && $_POST['name'] == 1){
        $name = 1;
    }else{
        $name = 0;
    }

    if(isset($_POST['email']) && $_POST['email'] == 1){
        $email = 1;
    }else{
        $email = 0;
    }

    if(isset($_POST['year']) && $_POST['year'] == 1){
        $year = 1;
    }else{
        $year = 0;
    }

    if(isset($_POST['club']) && $_POST['club'] == 1){
        $club = 1;
    }else{
        $club = 0;
    }

    if(isset($_POST['adress']) && $_POST['adress'] == 1){
        $adress = 1;
    }else{
        $adress = 0;
    }

    if(isset($_POST['category']) && $_POST['category'] == 1){
        $category = 1;
    }else{
        $category = 0;
    }

    if(isset($_POST['mailAdmin'])){
        if(validateEMAIL($_POST['mailAdmin'])) {
            $mailAdmin = safeText($_POST['mailAdmin']);
        }
    }

    $time = $_POST['date'];
    $time = str_replace(",", ".", $time);
    $time = str_replace("-", ".", $time);
    $time = explode(".", $time);
    if(!isset($time[0]) || !isset($time[1]) || !isset($time[2])){
        $err[] =  "Špatný formát datumu (DD. MM. RRRR)!";
    }else{
        $time[0] = trim ($time[0]);
        $time[1] = trim ($time[1]);
        $time[2] = trim ($time[2]);
        $date = $time[0] . ". " . $time[1] . ". " .$time[2];


        $timestampEntry = mktime(0, 0, 0, $time[1], $time[0], $time[2]);
    }


  $OptionsAll->updateEnroll($event['author'], $event['id'], $timestampEntry, $gender, "1", $email, $year, $club, $adress, $categoriesPOST, $mailAdmin);
  
}


return include_once("views/calendar/enrollSystemSetting.php");