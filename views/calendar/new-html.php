<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:55
 */
$container = "<h1>$headlineTitle - (" . date("j. n. Y", $timestamp) . ')</h1>';
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<form action='' method='post'><input type='text' hidden name='isSaved' value='$isSaved'>";
$container .= "<div class='textInput_div'>Nadpis:<br>
         <input type='text' name='title' value='{$mainTitle}'></div>";


$container .= "<div class='textInput_div'>Pořadatel:<br>";
$container .= "<input type='text' name='organisator' value='{$organisator}' id='eventOrganisator'></div>";
$container .= "<div  class='checkboxInput_div'><input type='checkbox' name='meOrganisator' value='1' id='eventOrganisatorCheckbox' onclick='organisatorFCE()'";
if($meOrganisator == 1){
    $container .= "checked";
}
$container .= "> Já jsem pořadatel<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
if($enrollSystem == 1){
    $container .= "checked";
}
$container .= "> Chci Tiary přihlašovací systém (<small>Nastavení proběhne v dalším kroku</small>)<br></div>";


$container .= "<div class='textareaInput_div'>Popis:<br>
         <textarea class='textarea' name='subsciption'>$subsciption</textarea></div>";
$container .= "<div class='textareaInput_div'>Místo:<br>
         <textarea class='textarea' name='place'>$place</textarea></div>";
$container .= "<h3>Nastavení události</h3>";
$container .= "<div class='selectInput_div'>Přístup:<br>
                <select name='access'>$access</select>
                </div><br>";
$container .= "<div class='selectInput_div'>Typ události:<br>
                <select name='eventType'>$eventType</select>
                </div>";

$container .= "<input type='submit' value='$save'  class='submit'>$enrollButton</form>";


return $container;