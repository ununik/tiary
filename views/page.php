<?php
return "
<!doctype>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0'>
        <script src='js/tinymce/js/tinymce/tinymce.min.js'></script>
        <link href='https://fonts.googleapis.com/css?family=Play:400,700&subset=latin,latin-ext,greek,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
        <link rel='stylesheet' href='views/css/style.css' type='text/css' media='screen'/>
        <link rel='stylesheet' href='views/css/style_mobil.css' type='text/css' media='handheld, only screen and (max-device-width: 1023px)'/>
        <script src='js/basicPage.js'></script>
        <script src='js/ajax.js'></script>
        <title>$title</title>
        <style>
        </style>
    </head>
    <body onload='onload()'>
    <div id='header'><a href='index.php'><img src='images/view/tiary_header.png' id='header_logo'></a>$header</div>
    <div id='notice'></div>
    <nav>$navigation</nav>
    <div id='contentbox'>
        <div id='content'>
            $contetnt
        </div>
    </div>
    </body>
</html>";