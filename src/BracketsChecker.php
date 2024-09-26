<?php

declare(strict_types=1);

namespace VodovskovEa\BracketsChecker;

class BracketsChecker
{
    private const CLOSE_BRACKET_TO_OPEN_BRACKET = [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];

    public function check(string $string): bool
    {
        $stack = [];
        $iMax = strlen($string);
        for ($i = 0; $i < $iMax; ++$i) {
            $char = $string[$i];
            if (!in_array($char, array_merge(array_keys(self::CLOSE_BRACKET_TO_OPEN_BRACKET), array_values(self::CLOSE_BRACKET_TO_OPEN_BRACKET)), true)) {
                continue;
            }

            if (in_array($char, array_values(self::CLOSE_BRACKET_TO_OPEN_BRACKET), true)) {
                $stack[] = $char;
            }

            if (array_key_exists($char, self::CLOSE_BRACKET_TO_OPEN_BRACKET) && array_pop($stack) !== self::CLOSE_BRACKET_TO_OPEN_BRACKET[$char]) {
                return false;
            }
        }

        return [] === $stack;
    }
}
