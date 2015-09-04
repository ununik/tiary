<?php
$typeOptionsAll = new Event();
$typeOption = $typeOptionsAll->getTypeOptions();
$options = "";
foreach($typeOption as $option){
    $options .= "<option value='{$option["title"]}'";
    if($_POST['eventType'] == $option["title"]){
        $options .= " selected ";
    }
    $options .= ">{$option["cz"]}</option>";
}
return $options;