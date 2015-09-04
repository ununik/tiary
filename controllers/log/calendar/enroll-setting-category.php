<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 16:03
 */
$OptionsAll = new Event();
$options = "";


$options = "<h4>Biatlon</h4>";
$catOption = $OptionsAll->getCategoriesOptions("biatlon");
foreach($catOption as $option){
    $options .= "<div><input type='checkbox' name='enrollSystem' value='1'";
        $options .= " checked ";
    $options .= ">{$option["cz"]}</div>";
}

return $options;