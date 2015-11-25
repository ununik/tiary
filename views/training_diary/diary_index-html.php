<?php
$container = '<h1>Tréninkový deník</h1>';
$container .= "<div class='content'>";
$container .= "<div  class='left_part'><h4>Přidat nový trénink</h4>";
$container .= $newTraining;
$container .= "</div>";
$container .= "<div  class='right_part'><h4>Aktuální týden</h4>";
$container .= $actualWeek;
$container .= "</div>";
$container .= "</div>";

return $container;