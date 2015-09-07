<?php
$acessOptionsAll = new Event();
$accessOption = $acessOptionsAll->getAccessOptions();
$options = "";
foreach($accessOption as $option){
    $options .= "<option value='{$option["title"]}'";
    if(isset($_POST['access']) && $_POST['access'] == $option["title"]){
        $options .= " selected ";
    }
    $options .= ">{$option["cz"]}</option>";
}
return $options;