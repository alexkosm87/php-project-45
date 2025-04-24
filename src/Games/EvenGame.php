<?php

namespace PhpProject45\Games\EvenGame;

use function PhpProject45\Engine\runGame;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function runEvenGame(): void
{
    $generateQuestionAndAnswer = function (): array {
        $number = random_int(0, PHP_INT_MAX);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $question = (string)$number;

        return [$question, $correctAnswer];
    };

    runGame($generateQuestionAndAnswer, GAME_DESCRIPTION);
}
