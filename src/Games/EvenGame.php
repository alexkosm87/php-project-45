<?php

namespace Games\EvenGame;

use function cli\line;
use function cli\prompt;

function isEven($number) 
{
    return $number % 2 === 0;
}

function welcome() 
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function playGame() 
{
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        $number = random_int(0, PHP_INT_MAX);
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        line("Question: %d", $number);
        $userAnswer = prompt("Your answer:");

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line("Correct!");
        $correctAnswersCount++;
    }

    line("Congratulations, %s!", $name);
}
