<?php

/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:27
 */
class Enroll extends Connection
{
    public function setEnroll($event, $gender, $name, $email, $age, $club, $adress, $category, $message){
        $db = parent::connect();
        $timestamp = time();
        $result = $db->prepare("INSERT INTO `enroll`(`event`, `timestamp`, `gender`, `name`, `email`, `age`, `club`, `adress`, `category`, `message`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $result->execute(array($event, $timestamp, $gender, $name, $email, $age, $club, $adress, $category, $message));
        $this->lastId = $db->lastInsertId();
        $ev = new Event();
        $eventMail = $ev->getEnrollMail($event);
        $this->sendRegistrationMail($eventMail, $event, $gender, $name, $email, $age, $club, $adress, $category, $message);
        return $this->lastId;
    }
    public function getEnroll($event){
        $db = parent::connect();
        $result = $db->prepare("SELECT * FROM `enroll` WHERE event = ?");
        $result->execute(array($event));
        $event = $result->fetchAll();
        return $event;
    }

    protected function sendRegistrationMail($eventMail, $event, $gender, $name, $email, $age, $club, $adress, $category, $message){
        $ev = new Event();
        $eve = $ev->getEvent($event);
        $content = "<h1>{$eve['title']} - nov� p?ihl�ka</h1>";

        $content .= "Jm�no: $name";
        if($gender != ""){
            $content .= "Pohlav�: $gender<br>";
        }
        if($age != ""){
            $content .= "Ro?n�k: $age<br>";
        }
        if($club != ""){
            $content .= "Klub: $club<br>";
        }
        if($adress != ""){
            $content .= "Adresa: $adress<br>";
        }
        if($category != ""){
            $content .= "Kategorie: $category<br>";
        }
        if($message != ""){
            $content .= "Zpr�va: $message<br>";
        }
        $content .= "<a href='".$_SERVER['HTTP_HOST']."/index.php?page=calendar_enroll_admin&id=$event'>Zobrazit p?ihl�ky</a>";


        //Email information
        $admin_email = $eventMail;
        $subject = "Tiary - Nov� p?ihl�ka";
        $comment = $content;
        $header = "From: ununik@gmail.com\r\n";
        $header.= "MIME-Version: 1.0\r\n";
        $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $header.= "X-Priority: 1\r\n";

        //send email
        mail($admin_email, "$subject", $comment, $header);
    }
}