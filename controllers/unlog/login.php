<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 15:50
 */
$login = "";
$err = array();
if(isset($_POST['login'])){
    $checkLogin = new Login();
    if(!$checkLogin->checkLogin(safeText($_POST['login']), safeText($_POST['password']))){
        $err[] = "Špatné jméno nebo heslo!";
    }elseif(!$checkLogin->getValidate()){
        $err[] = "Účet stále nebyl validován pomocí kódu, který Vám přišel emailu!";
    }
    if(empty($err)){
        header("Location: index.php?page=home");
    }
}
return include_once("views/login/login-html.php");