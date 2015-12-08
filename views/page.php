<?php
return "
<!doctype>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0'>
        <script src='js/tinymce/js/tinymce/tinymce.min.js'></script>
        {$html->getCss()}
        <script src='js/basicPage.js'></script>
        <script src='js/ajax.js'></script>
        <script src='js/calendar.js'></script>
        <script src='js/training.js'></script>
        <script src='js/jquery-1.11.3.min.js'></script>
        <title>{$html->getTitle()}</title>
        <style>
        </style>
    </head>
    <body onload='onload()'>
    <div id='blackBackground'></div>
    <div id='grayBackground'></div>
    <div id='header'>{$html->getHeader()}</div>
    <div id='notice'></div>
    <nav>{$html->getNavigation()}</nav>
    <div id='contentbox'>
        <div id='content'>
        {$html->getContent()}
        </div>
    </div>
    </body>
</html>";