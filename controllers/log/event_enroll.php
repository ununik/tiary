<?php   
$eventDB = new Event();
$event = $eventDB->getEvent($_GET['id']);
 if($event['enroll'] != 1){
  header("location: index.php?page=calendar_event&id={$_GET['id']}");
 } 
$enroll = $eventDB->getEnroll($_GET['id'], $event['author']);
$mainTitle = $event['title'];
$name = "";
$email = "";
$age = "";
$club = "";
$adress = "";
$genderValue = "";
$category = "";
$message = "";
$err = array();
if($event['timestamp1'] == $event['timestamp2'] || $event['timestamp2'] == 0){
    $date = date("j. n. Y", $event['timestamp1']);
}else{
    $date = date("j. n. Y", $event['timestamp1']).' - '.date("j. n. Y", $event['timestamp2']);
}

if(isset($_POST['enroll'])){
  if(isset($_POST['name'])){
    $name = $_POST['name'];
    if(strlen($name) > 255){
      $err[] = "Příliš dlouhé jméno a příjmení!";
    }elseif(strlen($name) == 0){
      $err[] = "Není vyplněné jméno";
    }
  }
  
  if(isset($_POST['email'])){
    $email = $_POST['email'];
    if(strlen($email) > 255){
      $err[] = "Příliš dlouhý email!";
    }elseif(strlen($email) == 0){
      $err[] = "Není vyplněný email";
    }
  }
  
  if(isset($_POST['age'])){
    $age = $_POST['age'];
    if(!is_numeric($age) || strlen($age) != 4){
      $err[] = "Rok narození musí být ve tvaru RRRR (např. 1999)!";
    }
  }
  
  if(isset($_POST['club'])){
    $club = $_POST['club'];
    if(strlen($club) > 255){
      $err[] = "Příliš dlouhý název klubu!";
    }
  }
  
  
  if(isset($_POST['adress'])){
    $adress = $_POST['adress'];
    if(strlen($adress) > 255){
      $err[] = "Příliš dlouhá adresa!";
    }elseif(strlen($adress) == 0){
      $err[] = "Není vyplněna adresa!";
    }
  }
  
    if(isset($_POST['message'])){
    $message = $_POST['message'];

  }
}


$gender = "<option value='m'";
if(isset($_POST['gender']) && $_POST['gender']=="m"){
  $genderValue = $_POST['gender']; 
  $gender .= " selected ";
}
$gender .= ">Muž</option><option value='f'";


if(isset($_POST['gender']) && $_POST['gender']=="f"){
  $genderValue = $_POST['gender']; 
  $gender .= " selected ";
}
$gender .= ">Žena</option>";


if(isset($_POST['enroll'])){
  if(empty($err)){
    $person = new Enroll();
    $lastname = $person->setEnroll($_GET['id'], $genderValue, $name, $email, $age, $club, $adress, $category, $message);
    unset($err);
    unset($_POST);
    $err = array();
    $err[] = "Přihláška byla úspěšně odeslána!"; 
    $name = "";
    $email = "";
    $age = "";
    $club = "";
    $adress = "";
    $genderValue = "";
    $category = "";
    $message = "";  
  }
}
return include_once("views/calendar/enroll-html.php");