<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 10:54
 */
$err = "";
if(isset($_GET['code']) && $_GET['code'] != ""){
    $code = $_GET['code'];
    $checkCode = new Registration();
    if($checkCode->checkCode($code)){
        header('Location: index.php?page=login');
    }else{
        $err = "Špatný kód!";
    }
}
return include_once("views/registration/validation-html.php");