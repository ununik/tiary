<?php
$training = '';
$training .= "<form action='' method='post'>
		<div class='textInput_div'>Datum*:<br>
		<input type='text' value='' placeholder='DD. MM. RRRR' name='date' id='date' onfocus='issetCalendar()' onclick='issetCalendar()'><div id='calendar_js'></div>
		</div>
		<div>
			Náplň:<br>
			<ul id='napln'>
				<li>+ Přidat</li>
			</ul>
		</div>
		<div class='textareaInput_div'>Popis:<br>
         <textarea name='club'  class='textarea'></textarea></div>
		<div class='textareaInput_div'>Pocit:<br>
         <textarea name='club'  class='textarea'></textarea></div>
		<div class='textInput_div'>Místo:<br>
		<input type='text' name='email' value=''>
		</div>
		<input type='submit' value='registrovat' class='submit'>
		</form>";
return $training;