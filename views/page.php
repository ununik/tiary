<?php
return "
<!doctype>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width; initial-scale=1.0'>
        {$html->getIcon()}

        {$html->getCss()}
        {$html->getScripts()}

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
    <div id='div'>
    </body>
</html>";