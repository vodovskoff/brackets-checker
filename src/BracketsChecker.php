<?php

declare(strict_types=1);

namespace VodovskovEa\BracketsChecker;

class BracketsChecker
{
    private array $closeBracketSet = [];
    private array $openBracketSet = [];

    private const CLOSE_BRACKET_TO_OPEN_BRACKET = [
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];

    public function __construct()
    {
        foreach (self::CLOSE_BRACKET_TO_OPEN_BRACKET as $closeBracket => $openBracket) {
            $this->openBracketSet[$openBracket] = true;
            $this->closeBracketSet[$closeBracket] = true;
        }
    }

    public function check(string $string): bool
    {
        $stack = [];
        $iMax = strlen($string);

        for ($i = 0; $i < $iMax; ++$i) {
            $char = $string[$i];
            if (isset($this->closeBracketSet[$char]) && array_pop($stack) !== self::CLOSE_BRACKET_TO_OPEN_BRACKET[$char]) {
                return false;
            }

            if (isset($this->openBracketSet[$char])) {
                $stack[] = $char;
            }
        }

        return [] === $stack;
    }
}
