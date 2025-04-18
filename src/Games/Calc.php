<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Calc
{
    private const OPERATIONS = ['+', '-', '*'];
    private const ROUNDS = 3;

    public function run()
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        echo "What is the result of the expression?\n";
        for ($i = 0; $i < self::ROUNDS; $i++) {
            // Генерация вопроса
            $num1 = random_int(1, 50);
            $num2 = random_int(1, 50);
            $operation = self::OPERATIONS[array_rand(self::OPERATIONS)];
            $question = "$num1 $operation $num2";

            // Вычисление правильного ответа
            $num1 = (int)$num1; // Приведение к типу int
            $num2 = (int)$num2; // Приведение к типу int

            switch ($operation) {
                case '+':
                    $correctAnswer = $num1 + $num2;
                    break;
                case '-':
                    $correctAnswer = $num1 - $num2;
                    break;
                case '*':
                    $correctAnswer = $num1 * $num2;
                    break;
                default:
                    throw new \Exception("Unsupported operation: $operation");
            }

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
