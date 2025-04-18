<?php

namespace Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(callable $generateQuestionAndAnswer, string $gameDescription): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name? ');
    line("Hello, $name!");
    line($gameDescription);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $generateQuestionAndAnswer();
        line("Question: $question");
        $userAnswer = prompt('Your answer: ');

        if ($userAnswer === $correctAnswer) {
            line('Correct!');
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
