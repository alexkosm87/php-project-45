<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

class Engine
{
    public static function run($game)
    {
        line("Welcome to the Brain Games!");
        $name = prompt("May I have your name?");
        line("Hello, $name!");

        $rounds = 3;
        for ($i = 0; $i < $rounds; $i++) {
            $question = $game->getQuestion();
            line("What is the result of the expression?");
            line("Question: $question");
            $answer = prompt("Your answer:");

            if ($answer == $game->getCorrectAnswer($question)) {
                line("Correct!");
            } else {
                line("'$answer' is wrong answer ;(. Correct answer was '{$game->getCorrectAnswer($question)}'.");
                line("Let's try again, $name!");
                return;
            }
        }
        line("Congratulations, $name!");
    }
}
