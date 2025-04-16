<?php

namespace PhpProject45;

class Engine
{
    public static function run($game)
    {
        $game->run();
    }

    public static function getUserName(): string
    {
        echo "Welcome to the Brain Games!\n";
        echo "May I have your name? ";
        $name = trim(fgets(STDIN));
        return $name;
    }

    public static function welcome($name)
    {
        echo "Hello, $name!\n";
        echo "What is the result of the expression?\n";
    }

    public static function askQuestion(string $question)
    {
        echo "Question: $question\n";
        echo "Your answer: ";
    }

    public static function getUserAnswer(): string
    {
        return trim(fgets(STDIN));
    }

    public static function correctAnswer()
    {
        echo "Correct!\n";
    }

    public static function wrongAnswer(string $userAnswer, string $correctAnswer, string $name)
    {
        echo "'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\n";
        echo "Let's try again, $name!\n";
    }

    public static function congratulate(string $name)
    {
        echo "Congratulations, $name!\n";
    }
}

