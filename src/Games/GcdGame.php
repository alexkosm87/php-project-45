<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class GcdGame
{
    public function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function run()
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        Engine::askQuestion("Find the greatest common divisor of given numbers.");

        for ($i = 0; $i < 3; $i++) {
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);
            $correctAnswer = $this->gcd($num1, $num2);

            $question = "$num1 $num2";
            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            if ($userAnswer != $correctAnswer) {
                Engine::wrongAnswer($userAnswer, $correctAnswer, $name);
                return;
            }

            Engine::correctAnswer();
        }

        Engine::congratulate($name);
    }
}
