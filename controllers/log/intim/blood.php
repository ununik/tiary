<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 11.09.2015
 * Time: 15:45
 */
$bloodContainer = "<option value='0'";
if($blood == 0){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Žádné</option>
                    <option value='1'";
if($blood == 1){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Velmi slabé</option>
                    <option value='2'";
if($blood == 2){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Slabé</option>
                    <option value='3'";
if($blood == 3){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Střední</option>
                    <option value='4'";
if($blood == 4){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Silné</option>
                    <option value='5'";
if($blood == 5){
    $bloodContainer = " selected ";
}
$bloodContainer .= ">Velmi silné</option>";

return $bloodContainer;