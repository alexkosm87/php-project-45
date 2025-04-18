<?php

namespace PhpProject45;

function runGame(callable $gameLogic): void
{
    $name = getUserName();
    welcome($name);
    $gameLogic($name);
}

function getUserName(): string
{
    echo "Welcome to the Brain Games!\n";
    echo "May I have your name? ";
    $name = trim(fgets(STDIN));
    return $name;
}

function welcome(string $name): void
{
    echo "Hello, $name!\n";
}

function askQuestion(string $question): void
{
    echo "Question: $question\n";
    echo "Your answer: ";
}

function getUserAnswer(): string
{
    return trim(fgets(STDIN));
}

function correctAnswer(): void
{
    echo "Correct!\n";
}

function wrongAnswer(string $userAnswer, string $correctAnswer, string $name): void
{
    echo "'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\n";
    echo "Let's try again, $name!\n";
}

function congratulate(string $name): void
{
    echo "Congratulations, $name!\n";
}
