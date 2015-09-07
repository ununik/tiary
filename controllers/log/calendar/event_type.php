<?php
$typeOptionsAll = new Event();
$typeOption = $typeOptionsAll->getTypeOptions();
$options = "";
foreach($typeOption as $option){
    $options .= "<option value='{$option["title"]}'";
    if(isset($_POST['eventType']) && $_POST['eventType'] == $option["title"]){
        $options .= " selected ";
    }
    $options .= ">{$option["cz"]}</option>";
}
return $options;