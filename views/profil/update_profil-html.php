<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 16:40
 */
$container = "<h1>Úprava profilu</h1>";
if(!empty($err)) {
    $container .= "<div id='errors'>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<form action='' method='post'  enctype='multipart/form-data'>";
$container .= "<div class='textInput_div'>Profilový obrázek<br>
         <input type='file' name='profile_image' accept='image/*'><br>
         $oldProfileImages
         </div>";
$container .= "<div class='textInput_div'>Křestní jméno:<br>
         <input type='text' name='firstname' value='{$firstname}'></div>";
$container .= "<div class='textInput_div'>Prostřední jméno:<br>
         <input type='text' name='middlename' value='{$middlename}'></div>";
$container .= "<div class='textInput_div'>Příjmení:<br>
         <input type='text' name='lastname' value='{$lastname}'></div>";
$container .= "<div class='selectInput_div'>Pohlaví:<br>
                <select name='gender'>$gender</select>
                </div>";
$container .= "<div class='textInput_div'>Email:<br>
         <input type='text' name='email' value='{$email}'></div>";


$container .= "<div  class='checkboxInput_div'>
         <input type='checkbox' name='showMail' value='1' ";
            if($showMail == 1){
                $container .= "checked";
            }
$container .= ">Ukazovat email na profilu</div>";

$container .= "<div class='textInput_div'>Telefon:<br>
         <input type='text' name='tel' value='{$tel}'></div>";


$container .= "<div  class='checkboxInput_div'>
         <input type='checkbox' name='showTel' value='1' ";
if($showTel == 1){
    $container .= "checked";
}
$container .= ">Ukazovat telefon na profilu</div>";

$container .= "<div class='textareaInput_div'>Klub(y):<br>
         <textarea name='club'  class='textarea'>{$club}</textarea></div>";

$container .= "<div class='textareaInput_div'>O mně:<br>
         <textarea name='about_me'  class='textarea'>{$about_me}</textarea></div>";

$container .= "<input type='submit' value='Uložit'  class='submit'></form>";

return $container;