<?php
$container = "<h1>Přihlášky - $mainTitle <small>($date)</small></h1>";
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<form action='' method='post'><input type='text' name='enroll' hidden>";
if($enroll['gender'] == 1){
$container .= "<div class='selectInput_div'>Pohlaví:<br>
                <select name='gender'>$gender</select>
                </div>";
}
$container .= "<div class='textInput_div'>Jméno a příjmení:<br>
         <input type='text' name='name' value='{$name}'></div>";
         
if($enroll['email'] == 1){
$container .= "<div class='textInput_div'>Email:<br>
         <input type='text' name='email' value='{$email}'></div>";
}
if($enroll['age'] == 1){
$container .= "<div class='textInput_div'>Ročník narození:<br>
         <input type='text' name='age' value='{$age}'></div>";
}
if($enroll['club'] == 1){
$container .= "<div class='textInput_div'>Klub:<br>
         <input type='text' name='club' value='{$club}'></div>";
}
if($enroll['adress'] == 1){
$container .= "<div class='textInput_div'>Adresa:<br>
         <input type='text' name='adress' value='{$adress}'></div>";
}

$container .= "<div class='textareaInput_div'>Zpráva pro pořadatele:<br>
         <textarea name='message'  class='textarea'>{$message}</textarea></div>";
         
$container .= "<input type='submit' value='Odeslat'  class='submit'></form>";


return $container;