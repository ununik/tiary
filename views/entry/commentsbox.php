<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 16:21
 */
$comm = "<div class='comments_box_all'>";
$comm .= "<h3>Komentáře</h3>";
$comm .= "<div>$saved</div>";
$comm .= "<div  class='textareaInput_div'>Přidat komentář:<br>
          <form action='' method='post'><textarea name='comment' class='textarea'></textarea></div>";
$comm .= "<input type='submit' value='Přidat'  class='submit'></form>";
$comm .= $commentsInBox;
$comm .= "</div>";

return $comm;