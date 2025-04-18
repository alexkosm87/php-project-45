<?php

namespace PhpProject45\Games;

use function PhpProject45\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression(): array
{
    $start = rand(1, 10);
    $step = rand(1, 5);
    $length = rand(5, 10);
    $hiddenIndex = rand(0, $length - 1);

    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $element = $start + $i * $step;
        $progression[] = $i === $hiddenIndex ? '..' : $element;
    }

    return [$progression, $start + $hiddenIndex * $step];
}

function generateQuestionAndAnswer(): array
{
    [$progression, $missingNumber] = generateProgression();
    $question = implode(' ', $progression);
    return [$question, (string)$missingNumber];
}

function runProgressionGame(): void
{
    runGame(__NAMESPACE__ . '\generateQuestionAndAnswer', DESCRIPTION);
}
