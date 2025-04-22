<?php

namespace PhpProject45\Games\GcdGame;

use function PhpProject45\Engine\runGame;

const GCD_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function gcd(int $a, int $b): int
{
    return $b === 0 ? $a : gcd($b, $a % $b);
}

function runGcdGame(): void
{
    $generateGcdQuestionAndAnswer = function (): array {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = "$num1 $num2";
        $correctAnswer = (string) gcd($num1, $num2);

        return [$question, $correctAnswer];
    };

    runGame($generateGcdQuestionAndAnswer, GCD_DESCRIPTION);
}
