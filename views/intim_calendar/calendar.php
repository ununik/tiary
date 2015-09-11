<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 10:59
 */
$container = '<h1>Můj intimní deníček</h1>';
$container .= "<form action='' method='post'>";
$container .= "<table class='intim_form_table'><th>Datum:</th><th>Teplota:</th><th>Krvácení:</th><th></th><tr>";
$container .= "<td class='intim_form_table_date'>
         <input type='text' name='date' value='{$date}'></td>";
$container .= "<td class='intim_form_table_temperatur'>
         <input type='text' name='temperature' value='{$temperature}'></td>";
$container .= "<td class='intim_form_table_blood'>
                <select name='blood'>$blood</select>
                </td>";
$container .= "<td class='intim_form_table_submit'><input type='submit' value='Uložit'></td>";
$container .= "</tr></table>";
return $container;