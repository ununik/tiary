<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 15.09.2015
 * Time: 9:12
 */
$input = "";
if(!empty($err)) {
    $input .= "<div id='errors'>";
    foreach ($err as $error) {
        $input .= "<span>$error</span>";
    };
    $input .= "</div>";
}
$input .= "<table class='intim_form_table'><th>Datum:</th><th>Teplota:</th><th><div onclick='intime_close()'>Zavřít</div></th><tr>";
$input .= "<td class='intim_form_table_date'>
         <input type='text' name='date' value='{$date}' id='date' onclick='issetCalendar()'><div id='calendar_js'></div></td>";
$input .= "<td class='intim_form_table_temperatur'>
         <select name='temperatureSelect' id='intim_calendar_temperature' onchange='issetTemperatur()'>$temperatureSelect</select>
         <input type='text' name='temperatureINPUT' value='{$temperatureINPUT}' id='intim_calendar_other' ";
if($temperatureINPUT < 36 || $temperatureINPUT >= 38 ){
    $input .= " style='display: block' ";
}
$input .= "></td><td></td></tr>";
$input .= "<tr><td class='intim_form_table_blood' colspan='3'>
                         <input type='checkbox' name='menstruace' value='0' id='menstruace' onclick='intimBlood()'";
if ($menstruace == 1) {
    $input .= "checked";
}
$input .= "> <label for='menstruace'>Menstruace</label></td></tr><tr><td colspan='3'>
                <select name='blood' id='menstruace_select' ";
if ($menstruace == 1) {
    $input .= " style='display: block' ";
}
$input .= ">$blood</select><script>intimBlood()</script>
                </td>";
$input .= "</tr><tr><td colspan='3'>";
$input .= "<div  class='checkboxInput_div' id='ovulationDiv' ";
if ($menstruace == 1) {
    $input .= "style='display: none;' ";
}
$input .= ">
         <input type='checkbox' id='ovulation' value='1' ";
if($ovulation == 1){
    $input .= "checked";
}
$input .= ">Ovulace</div></td></tr></table>";
$input .= "<div class='textarea_div_intim'>Ovlivňující faktory:<br>
         <textarea id='factors'>{$factors}</textarea></div>";
$input .= "<div class='textarea_div_intim'>Hlen:<br>
         <textarea id='phlegm'>{$phlegm}</textarea></div>";
$input .= "<div class='textarea_div_intim'>Čípek:<br>
         <textarea id='suppository'>{$suppository}</textarea></div>";
$input .= "<div class='textarea_div_intim'>Poznámka:<br>
         <textarea id='comment'>{$comment}</textarea></div>";
$input .= "<input hidden type='text' value='$saved' id='savedData' style='display: none;'>";

$input .= "<input type='submit' value='Upravit' onclick='updateIntim($id); return false'  class='submit'>";

return $input;