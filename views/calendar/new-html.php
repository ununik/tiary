<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:55
 */
$container = '<h1>Nová událost - (' . date("j. n. Y", $timestamp) . ')</h1>';
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<form action='' method='post'>";
$container .= "<div class='textInput_div'>Nadpis:<br>
         <input type='text' name='title' value='{$title}'></div>";


$container .= "<div class='textInput_div'>Pořadatel:<br>";
$container .= "<input type='text' name='firstname' value='{$organisator}' id='eventOrganisator'></div>";
$container .= "<div  class='checkboxInput_div'><input type='checkbox' name='meOrganisator' value='1' onclick='organisator(this)'";
if($meOrganisator == 1){
    $container .= "checked";
}
$container .= "> Já jsem pořadatel<br></div></div>";



$container .= "<input type='submit' value='Uložit'  class='submit'></form>";


return $container;