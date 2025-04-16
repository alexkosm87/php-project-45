<?php

namespace Engine;

use function cli\line;
use function cli\prompt;

class GameEngine
{
    private $roundsToWin = 3;

    public function run($game)
    {
        $name = $this->welcome();
        line('What is the result of the expression?');

        $correctAnswersCount = 0;

        while ($correctAnswersCount < $this->roundsToWin) {
            [$question, $correctAnswer] = $game->getQuestionAndAnswer();
            line("Question: %s", $question);
            $userAnswer = prompt("Your answer:");

            if ((int)$userAnswer !== $correctAnswer) {
                line("'%s' is wrong answer ;(. Correct answer was '%d'.", $userAnswer, $correctAnswer);
                line("Let's try again, %s!", $name);
                return;
            }

            line("Correct!");
            $correctAnswersCount++;
        }

        line("Congratulations, %s!", $name);
    }

    private function welcome()
    {
        line('Welcome to the Brain Games!');
        $name = prompt('May I have your name?');
        line("Hello, %s!", $name);
        return $name;
    }
}

