<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 9:43
 */
$container = "<h1>Přihlášení</h1>";
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .=  "
               <form action='' method='post'>
               <div  class='textInput_div'>Přihlašovací jméno<br>
                   <input type='text' name='login' placeholder='Přihlašovací jméno' value='$login'>
                   </div>
               <div  class='textInput_div'>Heslo<br>
                   <input type='password' name='password' placeholder='Heslo'>
                   </div>
               <input type='submit' value='přihlásit'  class='submit'>
               </form>
               <div>Ještě nemám svůj účet - <a href='index.php?page=registration'>registrovat</a></div>";

return $container;