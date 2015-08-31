<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 20.08.2015
 * Time: 14:10
 */
$cont = "<a href='index.php?page=entries&entry=all'>Všechny články</a>
         <a href='index.php?page=entries&entry=new'>Nový článek</a>";
if(!isset($_GET['entry'])){
    $entry = "all";
}else{
    $entry = $_GET['entry'];
}
switch($entry){
    case "all":
        $cont .= include("controllers/log/entry/entry-all.php");
        break;
    case "new":
        include("controllers/log/entry/entry-check.php");
        $sports = include("controllers/log/entry/entries-sports-select.php");
        $cont .= include_once("views/entry/enties_new-html.php");
        break;
    default:
        include("controllers/log/entry/entry-check-num.php");
        $sports = include("controllers/log/entry/entries-sports-select.php");
        $cont .= include_once("views/entry/enties_new-html.php");
}
$title = 'Články | Tiary';
return $cont;