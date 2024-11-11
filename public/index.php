<?php

use VodovskovEa\BracketsChecker\BracketsChecker;

require_once '../vendor/autoload.php';

$bracketsChecker = new BracketsChecker();

$string = $_GET['string'] ?? null;

if (is_string($string)) {
    $result = $bracketsChecker->check($string) ? 'Правильна' : 'Неправильна';
}

$result ??= 'Надо строку передать в ?string';

echo $result;
