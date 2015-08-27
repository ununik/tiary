<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 25.08.2015
 * Time: 11:26
 */
$container = "<a href='index.php?page=entries&entry=$id' class='entries_view_all'><h2>$headline</h2>";
$container .= "<div class='entry_text'>$firstParagraph</div></a>";
return $container;