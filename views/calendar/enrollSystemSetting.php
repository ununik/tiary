<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 15:41
 */
$container = "<h1>Nastavení přihlašovacího systému</h1>";
$container .= "<form action='' method='post'><input type='text' hidden name='form'>";
$container .= "<h3>Spuštění přihlášek:</h3>";
$container .= "<div class='textInput_div'>Datum:<br>
                <input type='text' value='$date' placeholder='DD. MM. RRRR' name='date' id='date' onclick='issetCalendar()'><div id='calendar_js'></div></div>";
$container .= "<div class='textInput_div'>Email pro přihlášky:<br>
                <input type='text' value='$mailAdmin'name='mailAdmin'></div>";

$container .= "<h3>Ze kterých polí se bude skládat přihláška:</h3>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='gender' value='1'";
    if($gender == 1){
        $container .= "checked";
    }
$container .= "> Pohlaví<br></div>";


$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' disabled name='name' value='1' checked > Jméno a příjmení<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='email' value='1'";
if($email == 1){
    $container .= "checked";
}
$container .= "> Email<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='year' value='1'";
if($year == 1){
    $container .= "checked";
}
$container .= "> Ročník narození<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='club' value='1'";
if($club == 1){
$container .= "checked";
}
$container .= "> Klub<br></div>";

$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' name='adress' value='1'";
if($adress == 1){
$container .= "checked";
}
$container .= "> Adresa<br></div>";

/*
$container .= "<div  class='checkboxInput_div' id='eventEnrollSystem'><input type='checkbox' id='eventCategoryCheckbox' name='category' onclick='categoriesEnroll()' value='1'";
if($category == 1){
$container .= "checked";
}
$container .= "> Výběr kategorie<br></div>";

    $container .= "<div class='checkboxInput_subdiv' id='categories'>";
        $container .= $categories;
    $container .= "</div>";
*/
$container .= "<input type='submit' value='Uložit'  class='submit'>";

$container .= "</form><script>categoriesEnroll()</script>";

return $container;