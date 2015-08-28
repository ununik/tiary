<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 15:34
 */
class Profil extends Connection
{
    protected $myAccount;
    protected $id;
    protected $login;
    protected $email;
    public $firstname;
    public $middlename;
    public $lastname;
    protected $timestamp;
    protected $club;
    protected $emailAdmin;
    protected $tel;
    protected $showTel;


 public function __construct($id = 0, $login = "", $password = ""){
     $db = parent::connect();
     if($id == 0){
         $result = $db->prepare("SELECT * FROM `user` WHERE login = ? && password = ?");
         $result->execute(array($login, md5($password)));
         $user = $result->fetch();
         $this->myAccount = true;

     } else{
         $result = $db->prepare("SELECT * FROM `user` WHERE id = ? ");
         $result->execute(array($id));
         $user = $result->fetch();
         $this->myAccount = false;
     }

     $this->id = $user['id'];
     $this->login = $user['login'];
     $this->emailAdmin = $user['email'];
     if($user['showMail'] == 1) {
         $this->email = $user['email'];
     }else{
         $this->email = false;
     }
     $this->timestamp = $user['timestamp'];
     $this->firstname = $user['firstname'];
     $this->middlename = $user['middlename'];
     $this->lastname = $user['lastname'];
     $this->club = $user['club'];
     $this->tel = $user['tel'];
     $this->showTel = $user['showTel'];
 }
    public function isMyAccount(){
        return $this->myAccount;
    }

    public function getEmail(){
        return $this->email;
    }
    public function getEmailAdmin(){
        return $this->emailAdmin;
    }

    public function getName(){
        if($this->firstname == "" && $this->middlename == "" && $this->lastname == ""){
            return $this->login;
        }else{
            return $this->firstname.' '.$this->middlename.' '.$this->lastname;
        }
    }

    public function getAdminTel(){
        return $this->tel;
    }
    public function getShowTel(){
        return $this->showTel;
    }
    public function getTel(){
        if($this->showTel == true) {
            return $this->tel;
        }else{
            return false;
        }
    }

    public function getHowLongUser(){
        $today = time();
        $howLongSec = $today-$this->timestamp;
        if($howLongSec < 3600){
            $howLong = "0 hod";
        }elseif(($howLongSec/3600) < 24){
            $howLong = floor($howLongSec/3600)." h";
        }else{
            $howLong = floor($howLongSec/86400)." d";
        }

        return $howLong;
    }
    public function getClub(){
        $clubs = explode("_;_", $this->club);
        $output = "";
        foreach ($clubs as $club){
            if(trim($club) != "") {
                $output .= chop(trim($club)) . ", ";
            }
        }
        if($output != ""){
            $output = substr($output, 0, -2);
        }
        return $output;
    }
    public function getClubList(){
        return explode("_;_", $this->club);
    }
    public function getId(){
        return $this->id;
    }
    public function updateProfil($firstname, $middlename, $lastname, $club, $email, $showMail, $tel, $showTel){
        $db = parent::connect();
        $result = $db->prepare("UPDATE `user` SET `firstname` = ?, `middlename` = ?, `lastname` = ?, `club` = ?, `showMail` = ?, `email` = ?, `tel` = ?, `showTel` = ? WHERE id = ?");
        $result->execute(array($firstname, $middlename, $lastname, $club, $showMail, $email, $tel, $showTel , $this->id));
    }
}