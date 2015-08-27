<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 9:43
 */
$container = "<h1>Registrace</h1>";
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .=  "
               <form action='' method='post'>
               <div class='textInput_div'>Přihlašovací jméno*:<br>
                   <input type='text' name='login' value='$login'>
                   </div>
               <div class='textInput_div'>Heslo*:<br>
                   <input type='password' name='password'>
                   </div>
               <div class='textInput_div'>Ověření hesla*:<br>
                   <input type='password' name='password2'>
                   </div>
               <div class='textInput_div'>Email*:<br>
                   <input type='text' name='email' value='$email'>
                   </div>
               <div class='checkboxInput_div'><input type='checkbox' name='podminky'> Souhlasím s <a href='index.php?page=conditions' target='_blank'>podmínkami</a>
                   </div>
               <input type='submit' value='registrovat' class='submit'>
               </form>
               <div>Už jsem zaregistrovaný - <a href='index.php?page=login'>přihlásit se</a></div>
               <div id='underLine'>* Položky označené hvězdičkou jsou povinné, bez jejich vyplnění se nelze registrovat.</div>
               ";

return $container;