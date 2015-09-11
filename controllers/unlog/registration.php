<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 9:40
 */
$login = '';
$email = '';
$err = array();
if(isset($_POST['login'])){
    /**
     * LOGIN checkout
     */
    if($_POST['login'] == ""){
        $err[] = "Není vyplněné přihlašovací jméno!";
    }elseif(strlen($_POST['login']) > 255){
        $err[] = "Přihlašovací jméno je příliš dlouhé!";
        $login = safeText($_POST['login']);
    }else{
        $login = str_replace(' ', '', $_POST['login']);
        if($login != $_POST['login']){
            $err[] = "Přihlašovací jméno nesmí obsahvat mezery!";
        }
        $checkLogin = new Registration();
        if(!$checkLogin->checkLogin($_POST['login'])){
            $err[] = "Toto přihlašovací jméno již používá jiný uživatel!";
        }
        $login = safeText($_POST['login']);
    }

    /**
     * PASSWORD checkout
     */
    if($_POST['password'] != "") {
        if ($_POST['password'] !== $_POST['password2']) {
            $err[] = "Heslo se neshoduje s ověřením hesla!";
        }
        if (strlen($_POST['password']) < 4) {
            $err[] = "Příliš krátké heslo!";
        } elseif (strlen($_POST['password']) > 40) {
            $err[] = "Příliš dlouhé heslo!";
        }
    }else{
        $err[] = "Není vyplněné heslo!";
    }
    $password = md5($_POST['password']);

    /**
     * EMAIL checkout
     */
    if($_POST['email'] != ""){
        if(!validateEMAIL($_POST['email'])){
            $err[] = "Email má špatný formát!";
         }
        $checkLogin = new Registration();
        if(!$checkLogin->checkEmail($_POST['email'])){
            $err[] = "Toto email již používá jiný uživatel!";
        }
    }else{
        $err[] = "Email není vyplněný!";
    }
    $email = $_POST['email'];

    /**
     * PODMINKY checkout
     */
    if(!isset($_POST['podminky'])){
        $err[] = "Musí být potvrzené podmínky!";
    }


    if(empty($err)){
        $registration = new Registration();
        $registration->registrate($login, $password, $email);
    }
}
$cont = include_once("views/registration/registration-html.php");
return $cont;