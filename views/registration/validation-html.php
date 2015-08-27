<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 19.08.2015
 * Time: 12:30
 */
$cont = "<h2>Děkujeme za Vaši registraci.</h2>
        Na Vaši adresu byl zaslán email s validačním kódem.</br>
        <form action='' method='get' >
        <input type='text' name='page' value='validation' hidden='hidden'>
        <div  class='textInput_div'>Kód:<br>
            <input type='text' name='code'><br>
            </div>
        <input type='submit' value='Vložit'  class='submit'>
        </form>
        ";


return $cont;