<?php

namespace PhpProject45\Games\GcdGame;

use function PhpProject45\Engine\runGame;

const GCD_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function calculateGcd(int $a, int $b): int
{
    return $b === 0 ? $a : calculateGcd($b, $a % $b); // Исправлен вызов функции
}

function runGcdGame(): void
{
    $generateGcdQuestionAndAnswer = function (): array {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $question = "Question: $num1 $num2"; // Добавлен префикс
        $correctAnswer = (string) calculateGcd($num1, $num2);

        return [$question, $correctAnswer];
    };

    runGame($generateGcdQuestionAndAnswer, GCD_DESCRIPTION);
}
