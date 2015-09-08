<?php
$table = "<table class='enroll_admin'><tr>";
$table .= "<th></th>";

if($enroll['name'] == 1){
  $table .= "<th>Jméno a příjmení</th>";
}

if($enroll['gender'] == 1){
  $table .= "<th class='enroll_admin_gender'>Pohlaví</th>";
}

if($enroll['email'] == 1){
  $table .= "<th>Email</th>";
}

if($enroll['age'] == 1){
  $table .= "<th class='enroll_admin_age'>Ročník narození</th>";
}                

if($enroll['club'] == 1){
  $table .= "<th>Klub</th>";
}

if($enroll['adress'] == 1){
  $table .= "<th>Adresa</th>";
}
$table .= "<th>Zpráva</th>";
$table .= "</tr>";
$i = 0;


foreach($person as $man){ 
  $i++;
    $table .= "<tr><td>$i</td>";
    
    if($enroll['name'] == 1){
      $table .= "<td>{$man['name']}</td>";
    }
    
    if($enroll['gender'] == 1){
      $table .= "<td class='enroll_admin_gender'>{$man['gender']}</td>";
    }
    
    if($enroll['email'] == 1){
      $table .= "<td>{$man['email']}</td>";
    }
    
    if($enroll['age'] == 1){
      $table .= "<td class='enroll_admin_age'>{$man['age']}</td>";
    }                
    
    if($enroll['club'] == 1){
      $table .= "<td>{$man['club']}</td>";
    }
    
    if($enroll['adress'] == 1){
      $table .= "<td>{$man['adress']}</td>";
    }
    $table .= "<td>{$man['message']}</td>";
    $table .= "</tr>";
}





$table .= "</table>";