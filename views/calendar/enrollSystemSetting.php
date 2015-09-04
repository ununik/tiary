<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 15:41
 */
$container = "<h1>Nastavení přihlašovacího systému</h1>";
$container .= "<form action='' method='post'>";
$container .= "<h3>Ze kterých polí se bude skládat přihláška:</h3>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
$container .= "checked";
//}
$container .= "> Pohlaví<br></div>";


$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
    $container .= "checked";
//}
$container .= "> Jméno a příjmení<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
    $container .= "checked";
//}
$container .= "> Email<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
    $container .= "checked";
//}
$container .= "> Ročník narození<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
$container .= "checked";
//}
$container .= "> Klub<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='enrollSystem' value='1'";
//if($enrollSystem == 1){
$container .= "checked";
//}
$container .= "> Adresa<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' id='eventCategoryCheckbox' name='enrollSystem' onclick='categoriesEnroll()' value='1'";
//if($enrollSystem == 1){
$container .= "checked";
//}
$container .= "> Výběr kategorie<br></div>";

    $container .= "<div class='checkboxInput_subdiv' id='categories'>";
        $container .= $categories;
    $container .= "</div>";

$container .= "<input type='submit' value='Uložit'  class='submit'>";

$container .= "</form>";

return $container;