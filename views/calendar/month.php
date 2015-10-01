<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 31.08.2015
 * Time: 16:11
 */
$container = "<h1>Kalendář</h1>";

$container .= $calendar_term;
$container .= "<a href='index.php?page=calendar&term=month&date=$previousDate'>Předchozí měsíc</a><a href='index.php?page=calendar&term=month&date=$nextDate'>Následující měsíc</a>";

$container .= "<table class='calendar_month'><th colspan='7' id='calendar_week_header_date'>{$days[0]['date']} - {$days[$num-1]['date']}</th><tr>";
for($i=1; $i<8; $i++){
  $container .= "<td class='calendar_month_dayname'>{$daysname[$i]}</td>";
}
$container .= "</tr><tr>";
$NDay = 0;
for($i=0; $i<$firstday_num-1; $i++){
  $container .= "<td class='calendar_month_noDay'></td>";
  $NDay++ ;
}

for($monthDay = 1; $monthDay <= $num; $monthDay++){
  if($NDay > 6){
    $container .= "</tr><tr>";
    $NDay = 0;
  }
  $container .= "<td class='calendar_month_day_active calendar_month_day_active_empty'><a href='index.php?page=calendar&term=day&date={$days[$monthDay-1]['timestamp']}'><span class='calendar_month_date'>{$days[$monthDay-1]['day']}</span></a>";
  foreach($days[$monthDay-1]['events'] as $event){
        $container .= "<div>$event</div>";
    }
  $container .= "</td>";
  $NDay++;
}


 
for($NDay; $NDay<7; $NDay++){
  $container .= "<td class='calendar_month_noDay'></td>";
}


$container .= "</tr></table>";

return $container;