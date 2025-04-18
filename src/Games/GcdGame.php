<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class GcdGame
{
    public function gcd(int $a, int $b): int // Указан тип возвращаемого значения
    {
        while ($b !== 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function run(): void // Указан тип возвращаемого значения
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        echo "Find the greatest common divisor of given numbers.\n";

        for ($i = 0; $i < 3; $i++) {
            $num1 = random_int(1, 100);
            $num2 = random_int(1, 100);
            $correctAnswer = $this->gcd($num1, $num2);

            $question = "$num1 $num2";
            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            // Приведение к строке для сравнения
            if ($userAnswer !== (string)$correctAnswer) { 
                Engine::wrongAnswer($userAnswer, (string)$correctAnswer, $name); // Приведение к строке для correctAnswer
                return;
            }

            Engine::correctAnswer();
        }

        Engine::congratulate($name);
    }
}
