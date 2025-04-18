<?php

namespace PhpProject45\Games;

use function PhpProject45\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(): array
{
    $length = rand(5, 10);
    $start = rand(1, 20);
    $step = rand(1, 10);
    $hiddenIndex = rand(0, $length - 1);
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $i === $hiddenIndex ? '..' : $start + $i * $step;
    }

    return [$progression, $start + $hiddenIndex * $step];
}

function generateProgressionQuestionAndAnswer(): array
{
    [$progression, $missingNumber] = generateProgression();
    $question = implode(' ', $progression);
    $correctAnswer = (string) $missingNumber;

    return [$question, $correctAnswer];
}

function runProgressionGame(): void
{
    runGame(__NAMESPACE__ . '\generateProgressionQuestionAndAnswer', DESCRIPTION);
}
