<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Progression
{
    public $length;
    public $start;
    public $step;

    public function __construct()
    {
        $this->length = random_int(5, 10);
        $this->start = random_int(1, 10);
        $this->step = random_int(1, 5);
    }

    public function generateProgression(): array
    {
        $progression = [];
        for ($i = 0; $i < $this->length; $i++) {
            $progression[] = $this->start + $i * $this->step;
        }
        return $progression;
    }

    public function run()
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        echo "What number is missing in the progression?\n";

        for ($i = 0; $i < 3; $i++) {
            $questionData = $this->getQuestion();
            $question = $questionData['question'];
            $correctAnswer = $questionData['answer'];

            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            if ($userAnswer === $correctAnswer) {
                Engine::correctAnswer();
            } else {
                Engine::wrongAnswer($userAnswer, $correctAnswer, $name);
                return;
            }
        }

        Engine::congratulate($name);
    }

    public function getQuestion(): array
    {
        $progression = $this->generateProgression();
        $hiddenIndex = random_int(0, $this->length - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';

        return [
            'question' => implode(' ', $progression),
            'answer' => (string) $correctAnswer
        ];
    }
}
