<?php

namespace PhpProject45;

use function cli\prompt;
use function cli\line;

function runGame($gameLogic)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        [$question, $correctAnswer] = $gameLogic();
        line("Question: $question");
        $userAnswer = prompt("Your answer:");

        if ($userAnswer != $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
        $correctAnswersCount++;
    }

    line("Congratulations, %s!", $name);
}
