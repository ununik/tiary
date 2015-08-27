<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 24.08.2015
 * Time: 9:57
 */
$container = "<option value='' class='selectInput_div_option'>---</option>";
foreach($sports as $sport){
    $container .= "<option class='selectInput_div_option'";
    if($sportID == $sport['id']){
        $container .= " selected ";
    }
    $container .= "value='".$sport['id']."'>".$sport['cz']."</option>";
}


$container .= "<option class='selectInput_div_option'";
if($sportID == "other"){
    $container .= " selected ";
}
$container .= "value='other'>jiný</option>";

return $container;