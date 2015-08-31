<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 27.08.2015
 * Time: 14:33
 */
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$head = "";
$notices = new Notice();
$notices = $notices->getNotice($profil->getId());
$headerNotice = "";
if(!empty($notices)){
    $headerNotice = "!";
    if(count($notices) > 1){
        $headerNotice .= '<span class="headerNoticeNum">'.count($notices)."</span>";
    };
}

$headerName = "<span class='headerName'>{$profil->getName()}</span>";

$head .= $headerName;
$head .= '<span class="headerNotice">'.$headerNotice.'</span>';

return $head;