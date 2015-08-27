<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 16:38
 */
$err = array();
$firstname = $profil->firstname;
$middlename = $profil->middlename;
$lastname = $profil->lastname;
$email = $profil->getEmail();
$changeEmail = $profil->getEmailAdmin();
if($email == false) {
  $showMail = 0;
} else{
  $showMail = 1;
}

$email = $changeEmail;


$club = $profil->getClub();
if(isset($_POST['firstname'])){
  //Kontrola krestniho jmena
  $firstname = $_POST['firstname'];
  if(strlen($firstname) > 255){
    $err[] = "Příliš dlouhé křestní jméno!";
  }

  //Kontrola prostredniho jmena
  $middlename = $_POST['middlename'];
  if(strlen($middlename) > 255){
    $err[] = "Příliš dlouhé prostřední jméno!";
  }

  //kontrola prijmeni
  $lastname = $_POST['lastname'];
  if(strlen($lastname) > 255){
    $err[] = "Příliš dlouhé příjmení!";
  }


  //change email
  if($_POST['email'] != ""){
    if(!validateEMAIL($_POST['email'])){
      $err[] = "Email má špatný formát!";
    }
    $checkLogin = new Registration();
    if(!$checkLogin->checkEmail($_POST['email']) && $_POST['email'] != $profil->getEmailAdmin()){
      $err[] = "Toto email již používá jiný uživatel!";
    }
  }else{
    $err[] = "Email není vyplněný!";
  }
  $email = $_POST['email'];
  //show mail
  if(isset($_POST['showMail'])){
    $showMail = 1;
  }else{
    $showMail = 0;
  }


  $club = $_POST['club'];
  $clubUpdate = "";
  if($_POST['club'] != ""){
    $clubUpdate = nl2br ($_POST['club']);
    $clubUpdate = str_replace(",","_;_",$clubUpdate);
    $clubUpdate = str_replace("<br>","_;_",$clubUpdate);
    $clubUpdate = str_replace("<br />","_;_",$clubUpdate);
  }

  if(empty($err)){
    $profil->updateProfil($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $clubUpdate, $email, $showMail );
    $err[] = "Změny byly úspěšně uloženy!";
  }
}
return include_once("views/profil/update_profil-html.php");