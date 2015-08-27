<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 13:48
 */
class Login extends Connection
{
    protected $validate = false;
    public function checkLogin($login, $password){
        $db = parent::connect();
        $result = $db->prepare("SELECT `id`, `validate` FROM `user` WHERE login = ? && password = ?");
        $result->execute(array($login, md5($password)));
        $user = $result->fetch();
        if(isset($user['id'])){
            $this->validate = $user['validate'];
            $_SESSION['tiary']['log'] = true;
            $_SESSION['tiary']['login'] = $login;
            $_SESSION['tiary']['password'] = $password;
            return true;
        } else{
            return false;
        }
    }

    public function getValidate(){
        return $this->validate;
    }
}