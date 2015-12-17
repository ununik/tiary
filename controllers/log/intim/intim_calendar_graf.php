<?php
session_start();
function __autoload($name){
	include_once ("../../../models/Classes/$name.class.php");
}
$profil = new Profil(0, $_SESSION['tiary']['login'], $_SESSION['tiary']['password']);
$calendar = new IntimCalendarImage();
$timestamp_zacatek = $_GET['first_day'];
$timestamp_konec = $calendar->howLongThisMenstruation($timestamp_zacatek, $profil->getId());
$actualDay = strtotime("today", $timestamp_zacatek);

$datum = date("j. n. Y", $timestamp_zacatek) .' - ' . date("j. n. Y", $timestamp_konec);

$pocet_dnu = ($timestamp_konec - $timestamp_zacatek) / 86400;
for($i = 0; $i < $pocet_dnu; $i++){
	$dayInfo = $calendar->getDayInfo($profil->getId(), $actualDay);
	$days[$i]['timestamp'] = $actualDay;
	$days[$i]['menstruace'] = $dayInfo['blood'];
	$days[$i]['temperature'] = $dayInfo['temperature'];
	$days[$i]['factors'] = $dayInfo['factors'];
	if(!isset($days[$i]['ovulation'])){
		if($dayInfo['ovulation'] == 1){
			$days[$i]['ovulation'] = 1;
			$days[$i-1]['ovulation'] = 2;
			$days[$i+1]['ovulation'] = 2;
			$days[$i-2]['ovulation'] = 2;
			$days[$i-3]['ovulation'] = 2;
		}else{
			$days[$i]['ovulation'] = 0;
		}
	}
	$days[$i]['date'] = date("j. n.", $actualDay);

	$actualDay = $actualDay + 86400;
}
header("Content-Type: image/png");
$max_temperatur = 37.4;
$max_days = 35;

if($pocet_dnu > $max_days){
	$pocet_dnu = $max_days;
}

$min_temperatur = 36;
$rozsah_teplot = ($max_temperatur + 0.1) - $min_temperatur;
$height = ($rozsah_teplot * 150) + 200;
$y0 = $height - 150;
$x0 = 50;
$image = @imagecreate(1024, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
//sit
$color_black = imagecolorallocate($image, 0, 0, 0);
$color_red = imagecolorallocate($image, 255, 0, 0);
$color_green = imagecolorallocate($image, 0, 255, 0);
$color_dark_blue = imagecolorallocate($image, 0, 0, 80);
	//osa x - 31 px na 1 den
	imageline ( $image , $x0 - 5 , $y0 , $x0 + ($pocet_dnu * 31) + 31 , $y0 , $color_black);
	//osa y
	imageline ( $image , $x0 , $y0 + 5 , $x0, $y0 - ($rozsah_teplot * 150) , $color_black);
	//teplota
	$i = 1;
	for($teplota = $min_temperatur + 0.1; $teplota <= ($max_temperatur + 0.1); $teplota = $teplota + 0.1){
		imageline ( $image , $x0 - 3 , $y0 - (($teplota - $min_temperatur) * 150), $x0 + 3 , $y0 - (($teplota - $min_temperatur) * 150), $color_black);
		if($i == 0){
			$teplota_format = number_format((float)$teplota, 1, '.', '');
			imagestring ($image , 4 , $x0 - 40 , $y0 - ((($teplota - $min_temperatur) * 150) + 8) , "$teplota_format" , $color_black );
			$i++;
		}else{
			$i = 0;
		}
	}

	//dny
	$lastPositionTemperatur = 0;
	$last_temperatur = 0;
	for($den = 1; $den < ($pocet_dnu + 1); $den++){
		imageline ( $image , $x0 + ($den * 31) , $y0 + 3 , $x0 + ($den * 31) , $y0 - 3, $color_black);
		imagestringup ($image , 4 , $x0 + (($den * 31) - 21), $y0 + 75 , $days[$den-1]['date'] , $color_black );
		//Menstruace
		if($days[$den-1]['menstruace'] == 1){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 25 , $color_red );
		}elseif($days[$den-1]['menstruace'] == 2){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 50 , $color_red );
		}elseif($days[$den-1]['menstruace'] == 3){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 75 , $color_red );
		}elseif($days[$den-1]['menstruace'] == 4){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 100 , $color_red );
		}elseif($days[$den-1]['menstruace'] == 5){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 125 , $color_red );
		}

		//Ovulace
		if($days[$den-1]['ovulation'] == 1){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 24 , $color_green );
		}elseif($days[$den-1]['ovulation'] == 2){
			imagefilledrectangle ( $image , $x0 + (($den * 31) - 30) , $y0 - 1, $x0 + (($den * 31) - 1) , $y0 - 12 , $color_green );
		}

		//Teplota
		if($days[$den-1]['temperature'] != 0){
			if($last_temperatur != 0){
				imageline ( $image , $lastPositionTemperatur , $y0 - (($last_temperatur - $min_temperatur) * 150), $x0 + (($den * 31) - 15) , $y0 - (($days[$den-1]['temperature'] - $min_temperatur) * 150), $color_dark_blue);
				$last_temperatur = $days[$den-1]['temperature'];
				$lastPositionTemperatur = $x0 + ((($den) * 31) - 15);
			}
			if($last_temperatur == 0 ){
				$last_temperatur = $days[$den-1]['temperature'];
				$lastPositionTemperatur = $x0 + (($den * 31) - 15);
			}
			imagefilledellipse($image, $x0 + (($den * 31) - 15), $y0 - (($days[$den-1]['temperature'] - $min_temperatur) * 150), 7, 7, $color_dark_blue);
			if($days[$den-1]['factors'] != ""){
				imagestring ($image , 2 , $x0 + (($den * 31) - 15) , $y0 - (($days[$den-1]['temperature'] - $min_temperatur) * 150) - 22 , "!" , $color_red );
			}
		}
	}

	imagestring ($image , 4 , 350 , 50 , "$datum" , $color_black );
imagepng($image);
imagedestroy($image);
