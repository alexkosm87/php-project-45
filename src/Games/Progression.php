<?php

namespace Games;

use function Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';

function generateProgression($start, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function generateQuestionAndAnswer()
{
    $start = rand(1, 50);
    $step = rand(1, 10);
    $length = 10;

    $progression = generateProgression($start, $step, $length);
    $missingIndex = rand(0, $length - 1);
    $correctAnswer = (string)$progression[$missingIndex];
    $progression[$missingIndex] = '..';

    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function runProgressionGame(): void
{
    runGame('Games\generateQuestionAndAnswer', DESCRIPTION);
}
