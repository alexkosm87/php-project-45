<?php

namespace Games\EvenGame;

use function cli\line;
use function cli\prompt;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function welcome(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function generateQuestionAndAnswer(): array
{
    $number = random_int(0, PHP_INT_MAX);
    $correctAnswer = isEven($number) ? 'yes' : 'no';
    $question = (string)$number;

    return [$question, $correctAnswer];
}

function runEvenGame(): void
{
    $name = welcome();
    line(GAME_DESCRIPTION);

    $correctAnswersCount = 0;
    $roundsToWin = 3;

    while ($correctAnswersCount < $roundsToWin) {
        [$question, $correctAnswer] = generateQuestionAndAnswer();

        line("Question: %s", $question);
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
