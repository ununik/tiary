<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 16:03
 */
$OptionsAll = new Event();
$options = "";
$gender = 1;
$name = 1;
$email = 1;
$year = 1;
$club = 1;
$adress = 0;
$category = 0;
$link = "";
$day = date("j. n. Y");
$hour = date("H:i");

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



    $link = "Zde je odkaz na událost: ";
}

$options = "<h4>Biatlon</h4>";
$catOption = $OptionsAll->getCategoriesOptions("biatlon");
foreach($catOption as $option){
    $options .= "<div><input type='checkbox' name='{$option["title"]}' value='1'";
        if(isset($_POST[$option["title"]])){
            $options .= " checked ";
        }
    $options .= ">{$option["cz"]}</div>";
}

return $options;