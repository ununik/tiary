<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 04.09.2015
 * Time: 16:03
 */

$categoriesPOST = "";
$options = "<h4>Biatlon</h4>";
$catOption = $OptionsAll->getCategoriesOptions("biatlon");

foreach($catOption as $option){
    $options .= "<div><input type='checkbox' name='{$option["title"]}' value='1'";
        if(isset($_POST[$option["title"]])){
            $options .= " checked ";
            $categoriesPOST .= "{$option['id']}_;_";
        }
    $options .= ">{$option["cz"]}</div>";
}
return $options;