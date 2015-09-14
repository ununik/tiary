<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:59
 */
$container = '<h1>Můj intimní deníček</h1>';
if(!empty($err)) {
    $container .= "<div id='errors'>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<form action='' method='post'>";
$container .= "<table class='intim_form_table'><th>Datum:</th><th>Teplota:</th><th></th><th></th><tr>";
$container .= "<td class='intim_form_table_date'>
         <input type='text' name='date' value='{$date}' id='date' onclick='issetCalendar()'><div id='calendar_js'></div></td>";
$container .= "<td class='intim_form_table_temperatur'>
         <select name='temperatureSelect' id='intim_calendar_temperature' onchange='issetTemperatur()'>$temperatureSelect</select>
         <input type='text' name='temperatureINPUT' value='{$temperatureINPUT}' id='intim_calendar_other'></td>";
$container .= "<td class='intim_form_table_blood'>
                         <input type='checkbox' name='menstruace' value='1' id='menstruace' onclick='intimBlood()'";
                            if($menstruace == 1){
                                $container .= "checked";
                             }
                $container .= ">Období menstruace
                <select name='blood' id='menstruace_select'>$blood</select><script>intimBlood()</script>
                </td>";
$container .= "<td class='intim_form_table_submit'><input type='submit' value='Uložit'></td>";
$container .= "</tr></table><script>issetTemperatur()</script>";


$container .= $list;
return $container;