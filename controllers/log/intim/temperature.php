<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 14.09.2015
 * Time: 10:21
 */
$temp = "";
$temp .= "<option value='0'>---</option>";
for($t = 36.0; $t <= 38.0; $t = $t + 0.1){
    $temperatur = number_format((float)$t, 1, '.', '');
    $temp .= "<option value='$temperatur'";
        if($temperatur == $temperatureSelect){
            $temp .= " selected ";
        }
    $temp .= ">$temperatur</option>";
}
$temp .= "<option value='other'";
if('other' == $temperatureSelect ||  $temperatureINPUT < 36 || $temperatureINPUT >= 38 ){
    $temp .= " selected ";
}
$temp .= ">Jiná</option>";
return $temp;