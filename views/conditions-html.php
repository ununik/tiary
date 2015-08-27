<?php
/**
 * Created by PhpStorm.
 * User: ununik
 * Date: 17.08.2015
 * Time: 14:46
 */
$cont = "<h1>Podmínky</h1>";

$cont .= '<h2>Články</h2>';
$cont .= '<div class="content">Články jsou po sdílení přístupné všem, nezávisle na užívání služeb Tiary. Autor článku je zodpovědný za vlastnictví textu i dalších materiálů s článkem souvisejících. Tiary si vyhrazuje právo na stažení příspěvku z důvodů jako jsou urážlivé či hanlivé texty a podobné.</div>';

$cont .= '<h2>Heslo</h2>';
$cont .= '<div class="content">Heslo je druhým přihlašovacím údajem. Hesla nejsou v databázi viditelně uložená, nýbrž jsou zašifrovaná. V případě ztráty hesla vám bude k původnímu přihlašovacímu jménu vygenerováno nové heslo, které vám bude zaslané na uvedený email. Délka hesla musí být mezi 4 a 40 znaky.</div>';


$cont .= '<h2>Přihlašovací jméno</h2>';
$cont .= '<div  class="content">Přihlašovací jméno (login) je jedinečným pojmenováním uživatele, které se používá při přihlašování a v případě neuvedení jiného jména také jako identifikační jméno uživatele pro ostatní. Maximální délka přihlašovacího jména je 255 znaků.</div>';

return $cont;