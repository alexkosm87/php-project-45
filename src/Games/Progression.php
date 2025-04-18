<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

function runProgressionGame(string $name): void
{
    const ROUNDS = 3;

    echo "What number is missing in the progression?\n";

    for ($i = 0; $i < ROUNDS; $i++) {
        $progression = generateProgression();
        $hiddenIndex = random_int(0, count($progression) - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        $question = implode(' ', $progression);
        Engine\askQuestion($question);
        $userAnswer = Engine\getUserAnswer();

        if ($userAnswer !== (string)$correctAnswer) {
            Engine\wrongAnswer($userAnswer, (string)$correctAnswer, $name);
            return;
        }

        Engine\correctAnswer();
    }

    Engine\congratulate($name);
}

function generateProgression(): array
{
    $length = random_int(5, 10);
    $start = random_int(1, 10);
    $step = random_int(1, 5);
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}
