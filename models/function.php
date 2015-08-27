<?php
function validateEMAIL($EMAIL) {
    $v = "/^[_a-zA-Z0-9\.\-]+@[_a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,6}+$/";

    return (bool)preg_match($v, $EMAIL);
}