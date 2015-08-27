<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 20.08.2015
 * Time: 14:33
 */
$container = "<h1>$headline</h1>
                <form action='' method='post'>";
$container .= $link;
$container .= "<input type='text' name='num_entry' value='$num_entry' hidden>";
$container .= "<input type='text' name='shared' value='$shared' hidden>";
if(!empty($err)) {
    $container .= "<div id='errors'><h3>Varování:</h3>";
    foreach ($err as $error) {
        $container .= "<span>$error</span>";
    };
    $container .= "</div>";
}
$container .= "<div class='textInput_div'>Nadpis:<br>
                <input type='text' name='title' value='$title'></div>";
$container .= "<div class='selectInput_div'>Sport:<br>
                <select name='sport' onchange='issetSport(this)' id='sport_selection'>$sports</select>
                <input type='text' name='otherSport' id='sport_insteadOfSelect' placeholder='Jaký sport' value='$otherSport'>
                 <script  language='JavaScript' type='text/javascript'>
                  var select = document.getElementById('sport_selection');
                  issetSport(select)
                </script>
                </div>";

$container .= "<div class='textareaInput_div'>Článek:<br>
         <textarea name='entry' id='textareaInput_div_area'>$entry</textarea></div>
         <script>
               tinymce.init({
                    selector: 'textarea',
                    mode : \"textareas\",
                    theme: 'modern',
                    width: '100%',
                    image_advtab: true,
                    fontsize_formats: \"10pt 12pt 14pt 16pt 18pt 24pt 36pt\",
                    plugins: 'image table link autolink textcolor media fullscreen textpattern charmap lists',
                    textcolor_cols: 6,
                    toolbar1: 'fullscreen undo redo | styleselect | bullist numlist outdent indent | link image media',
                    toolbar2: 'bold italic underline | forecolor backcolor charmap fontsizeselect | alignleft aligncenter alignright alignjustify '
                          })
        </script>";
if($shared != 1) {
    $container .= "<button name='submit' class='submit' value='1'>Uložit a sdílet</button>";
}
$container .= "<button name='submit' class='submit' value='0'>Uložit</button>
               </form>";

return $container;