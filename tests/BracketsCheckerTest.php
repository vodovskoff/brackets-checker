<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use VodovskovEa\BracketsChecker\BracketsChecker;

final class BracketsCheckerTest extends TestCase
{
    private BracketsChecker $bracketsChecker;

    #[DataProvider('bracketsDataProvider')]
    public function testBrackets(string $string, bool $isValid): void
    {
        self::assertSame($isValid, $this->bracketsChecker->check($string));
    }

    public static function bracketsDataProvider(): array
    {
        return [
            [
                'string' => '(aaaa)',
                'isValid' => true,
            ],
            [
                'string' => '[fdsfsd]fdsfs',
                'isValid' => true,
            ],
            [
                'string' => '{fff}',
                'isValid' => true,
            ],
            [
                'string' => '()[fdfdf]{}',
                'isValid' => true,
            ],
            [
                'string' => '{[dsdsd(fff)]}',
                'isValid' => true,
            ],
            [
                'string' => '([{}])',
                'isValid' => true,
            ],
            [
                'string' => '([]{})',
                'isValid' => true,
            ],
            [
                'string' => '{[([])]}',
                'isValid' => true,
            ],
            [
                'string' => '(',
                'isValid' => false,
            ],
            [
                'string' => ')',
                'isValid' => false,
            ],
            [
                'string' => '({[}rere)]',
                'isValid' => false,
            ],
            [
                'string' => '[({fdfd})]',
                'isValid' => true,
            ],
            [
                'string' => '{[}',
                'isValid' => false,
            ],
            [
                'string' => '([)]',
                'isValid' => false,
            ],
            [
                'string' => '([{}',
                'isValid' => false,
            ],
            [
                'string' => ']{[()]}',
                'isValid' => false,
            ],
            [
                'string' => '{[()]}}',
                'isValid' => false,
            ],
            [
                'string' => '{[()]}',
                'isValid' => true,
            ],
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->bracketsChecker = new BracketsChecker();
    }
}
