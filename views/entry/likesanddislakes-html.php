<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 26.08.2015
 * Time: 11:15
 */

$LD = "<div>$liking</div>
       <form method='post' action=''><button name='like' value='1' $disable>+</button> - $likes<br>
                                     <button name='like' value='0' $disable>-</button> - $dislikes
                                     </form>";

return $LD;