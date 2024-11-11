<?php

use VodovskovEa\BracketsChecker\BracketsChecker;

require_once 'vendor/autoload.php';

$bracketsChecker = new BracketsChecker();

$string = '()()()()';

if ('exit' === strtolower($string)) {
    echo "Выходим отсюда\n";
}

$result = $bracketsChecker->check($string);

if ($result) {
    echo "Всё правильно\n";
} else {
    echo "Ошибка в скобках\n";
}
