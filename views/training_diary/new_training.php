<?php
$training = '';
$training .= "<form action='' method='post'>
		<div class='textInput_div'>Datum*:<br>
		<input type='text' value='' placeholder='DD. MM. RRRR' name='date' id='date' onfocus='issetCalendar()' onclick='issetCalendar()'><div id='calendar_js'></div>
		</div>
		<div>
			Náplň:<br>
			<ul id='napln'>
				
			</ul>
		<div onclick='addNewTraining()'>+ Přidat</div>
		</div>
		<div class='textareaInput_div'>Popis:<br>
         <textarea name='club'  class='textarea'></textarea></div>
		<div class='textareaInput_div'>Pocit:<br>
         <textarea name='club'  class='textarea'></textarea></div>
		<div class='textInput_div'>Místo:<br>
		<input type='text' name='email' value=''>
		</div>
		<input type='submit' value='registrovat' class='submit'>
		</form>
		<div id='napln_content'><table id='sport_table'>";
$n = 4;
foreach ($allSports as $sport){
	if($n > 3){
		$n = 0;
		$training .= "<tr>";
	}
	$training .= "<td>{$sport['nazev']}</td>";
	if($n == 3){
		$training .= "</tr>";
	}
	$n++;
}

if($n < 3){
	for($n; $n < 3; $n++){
	 	$training .= "<td></td>";	
	}
	$training .= "</tr>";
}
$training .= "</table><div id='sport_detail'></div></div>";
return $training;