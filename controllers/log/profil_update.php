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
$tel = $profil->getAdminTel();
$showTel = $profil->getShowTel();
$about_me = $profil->getAboutMe();
$imageName = $profil->getProfilImage();
$ProfileImages = new ProfileImage();
$ProfileImages = $ProfileImages->getAllUserAvatars($profil->getId());
$oldProfileImages = "";


foreach($ProfileImages as $img){
  $oldProfileImages .= "<button name='img' value='{$img['name']}' class='profil_oldimages'><img src='images/profile_images/small/{$img['name']}'></button>";
}

if($email == false) {
  $showMail = 0;
} else{
  $showMail = 1;
}
$gender = include_once('controllers/log/profil/gender.php');
$email = $changeEmail;


$club = $profil->getClub();
if(isset($_POST['firstname'])){
  //Kontrola krestniho jmena
  $firstname = safeText($_POST['firstname']);
  if(strlen($firstname) > 255){
    $err[] = "Příliš dlouhé křestní jméno!";
  }

  //Kontrola prostredniho jmena
  $middlename = safeText($_POST['middlename']);
  if(strlen($middlename) > 255){
    $err[] = "Příliš dlouhé prostřední jméno!";
  }

  //kontrola prijmeni
  $lastname = safeText($_POST['lastname']);
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

  //change tel
  $tel = safeText($_POST['tel']);
  if(strlen($tel) > 25){
    $err[] = "Příliš dlouhé telefonní číslo!";
  }
  //show mail
  if(isset($_POST['showTel']) && $_POST['showTel'] == 1){
    $showTel = 1;
  }else{
    $showTel = 0;
  }


  $club = $_POST['club'];
  $clubUpdate = "";
  if($_POST['club'] != ""){
    $clubUpdate = nl2br (safeText($_POST['club']));
    $clubUpdate = str_replace(",","_;_",$clubUpdate);
    $clubUpdate = str_replace("<br>","_;_",$clubUpdate);
    $clubUpdate = str_replace("<br />","_;_",$clubUpdate);
  }

  $about_me = safeText($_POST['about_me']);

  if($_FILES['profile_image']['name'] != ""){
    if($_FILES['profile_image']['error'] == ""){
      $profile_image = $_FILES['profile_image'];
      switch($profile_image['type']){
        case "image/png":
              $sufix = ".png";
              break;
        case "image/gif":
          $sufix = ".gif";
          break;
        case "image/jpeg":
          $sufix = ".jpg";
          break;
        case "image/jpg":
          $sufix = ".jpg";
          break;
        default:
              $sufix = "";
          $err[] = "Neznámý typ souboru.";
      }
      $profileImage = new ProfileImage();
      $profileImageNumber = $profileImage->getNumForNextImg();
      $imageName = $profileImageNumber . $sufix;
      $profileImage = $profileImage->setNewImg($imageName, $profile_image['size'], $profil->getId(), $profile_image['type']);
      move_uploaded_file($profile_image['tmp_name'], 'images/profile_images/original/'.$imageName);
      resizeImage(850, 'images/profile_images/large/'.$profileImageNumber, 'images/profile_images/original/'.$imageName);
      resizeImage(100, 'images/profile_images/small/'.$profileImageNumber, 'images/profile_images/original/'.$imageName);

    }else{
      $err[] = "Problém s uložením profilového obrázku.";
    }
  }

  if(isset($_POST['img'])){
    $imageName = $_POST['img'];
  }


  if(empty($err)){
    $profil->updateProfil($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $clubUpdate, $email, $showMail, $tel, $showTel, $_POST['gender'], $about_me, $imageName);
    $err[] = "Změny byly úspěšně uloženy!";
  }
}

$title = $profil->getName().' | Úprava profilu | Tiary';
return include_once("views/profil/update_profil-html.php");