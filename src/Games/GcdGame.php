<?php

namespace Gamess;

use function Engine\runGame;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function calculateGCD($a, $b)
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}

function generateQuestionAndAnswer()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);

    $question = "$num1 $num2";
    $correctAnswer = (string) calculateGCD($num1, $num2);

    return [$question, $correctAnswer];
}

function runGcdGame(): void
{
    runGame('Games\generateQuestionAndAnswer', DESCRIPTION);
}
