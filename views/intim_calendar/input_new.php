<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 15.09.2015
 * Time: 9:12
 */
$input = "<form action='' method='post'>";
$input .= "<table class='intim_form_table'><th>Datum:</th><th>Teplota:</th><th></th><th></th><tr>";
$input .= "<td class='intim_form_table_date'>
         <input type='text' name='date' value='{$date}' id='date' onclick='issetCalendar()'><div id='calendar_js'></div></td>";
$input .= "<td class='intim_form_table_temperatur'>
         <select name='temperatureSelect' id='intim_calendar_temperature' onchange='issetTemperatur()'>$temperatureSelect</select>
         <input type='text' name='temperatureINPUT' value='{$temperatureINPUT}' id='intim_calendar_other'></td>";
$input .= "<td class='intim_form_table_blood'>
                         <input type='checkbox' name='menstruace' value='1' id='menstruace' onclick='intimBlood()'";
if ($menstruace == 1) {
    $input .= "checked";
}
$input .= "> Menstruace
                <select name='blood' id='menstruace_select'>$blood</select><script>intimBlood()</script>
                </td>";
$input .= "<td class='intim_form_table_submit'><input type='submit' value='Uložit'></td>";
$input .= "</tr></table><script>issetTemperatur()</script>";

return $input;