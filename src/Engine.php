<?php

namespace Engine;

use function cli\line;
use function cli\prompt;

function runGame($gameLogic)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    $roundsCount = 3;

    for ($i = 0; $i < $roundsCount; $i++) {
        $question = $gameLogic['question']();
        $correctAnswer = $gameLogic['answer']($question);

        line("Question: $question");
        $userAnswer = prompt('Your answer:');

        if ($userAnswer !== (string)$correctAnswer) {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }

        line('Correct!');
    }

    line("Congratulations, $name!");
}

