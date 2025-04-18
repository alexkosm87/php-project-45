<?php

namespace Engine;

use function cli\prompt;
use function cli\line;

const ROUNDS = 3;

function greetUser()
{
    $name = prompt("May I have your name? ");
    line("Hello, $name!");
    return $name;
}

function askQuestion($question, $correctAnswer)
{
    line("Question: $question");
    $userAnswer = prompt("Your answer: ");

    return $userAnswer === $correctAnswer;
}

function runGame($gameFunction)
{
    $name = greetUser();
    line("What is the result of the expression?");

    for ($i = 0; $i < ROUNDS; $i++) {
        list($question, $correctAnswer) = $gameFunction();
        
        if (askQuestion($question, $correctAnswer)) {
            line("Correct!");
        } else {
            line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, $name!");
            return;
        }
    }

    line("Congratulations, $name!");
}
