<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Calc
{
    private const OPERATIONS = ['+', '-', '*'];
    private const ROUNDS = 3;

    public function run(): void // Указан тип возвращаемого значения
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
            $correctAnswer = $this->getCorrectAnswer($num1, $num2, $operation);

            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            // Приведение к строке для сравнения
            if ($userAnswer !== (string)$correctAnswer) {
                Engine::wrongAnswer($userAnswer, (string)$correctAnswer, $name);
                return;
            }

            Engine::correctAnswer();
        }

        Engine::congratulate($name);
    }

    // Метод для вычисления правильного ответа
    public function getCorrectAnswer(int $num1, int $num2, string $operation): int
    {
        switch ($operation) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            default:
                throw new \Exception("Unsupported operation: $operation");
        }
    }
}
