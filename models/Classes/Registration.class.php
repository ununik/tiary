<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 18.08.2015
 * Time: 16:46
 */
class Registration extends Connection
{
    public function registrate($login, $password, $email){
        $timestamp = time();
        $db = parent::connect();
        $code = $email."-".mt_rand(10,1000);
        $result = $db->prepare("INSERT INTO user (login, password, email, timestamp, code) VALUES (?, ?, ?, ?, ?)");
        $result->execute(array($login, $password, $email, $timestamp, $code));
        $this->sendRegistrationMail($email, $code);
        header('Location: index.php?page=validation');
    }
    public function checkLogin($login){
        $db = parent::connect();
        $result = $db->prepare("SELECT `id` FROM `user` WHERE login = ? ");
        $result->execute(array($login));
        $login = $result->fetch();
        if(isset($login['id'])){
            return false;
        } else{
            return true;
        }
    }
    public function checkEmail($email){
        $db = parent::connect();
        $result = $db->prepare("SELECT `id` FROM `user` WHERE email = ? ");
        $result->execute(array($email));
        $login = $result->fetch();
        if(isset($login['id'])){
            return false;
        } else{
            return true;
        }
    }

    public function checkCode($code){
        $email = explode("-", $code);
        $email = $email[0];
        $db = parent::connect();
        $result = $db->prepare("SELECT `id` FROM `user` WHERE email = ? && code = ? ");
        $result->execute(array($email, $code));
        $login = $result->fetch();
        if(isset($login['id'])){
            $result = $db->prepare("UPDATE `user` SET `validate` = 1 WHERE id = ?");
            $result->execute(array($login['id']));
            return true;
        } else{
            return false;
        }
    }
    protected function sendRegistrationMail($email, $code){
        $content = "Kód: <a href='".$_SERVER['HTTP_HOST']."/index.php?page=validation&code=$code'>$code</a>";


        //Email information
        $admin_email = $email;
        $subject = "Tiary registrace";
        $comment = $content;
        $header = "From: ununik@gmail.com\r\n";
        $header.= "MIME-Version: 1.0\r\n";
        $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $header.= "X-Priority: 1\r\n";

        //send email
        mail($admin_email, "$subject", $comment, $header);
    }
}