<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

function runCalcGame(string $name): void
{
    echo "What is the result of the expression?\n";

    $operations = ['+', '-', '*'];
    $rounds = 3;

    for ($i = 0; $i < $rounds; $i++) {
        // Генерация вопроса
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $operation = $operations[array_rand($operations)];
        $question = "$num1 $operation $num2";

        // Вычисление правильного ответа
        $correctAnswer = getCorrectAnswer($num1, $num2, $operation);

        Engine\askQuestion($question);
        $userAnswer = Engine\getUserAnswer();

        // Приведение к строке для сравнения
        if ($userAnswer !== (string)$correctAnswer) {
            Engine\wrongAnswer($userAnswer, (string)$correctAnswer, $name);
            return;
        }

        Engine\correctAnswer();
    }

    Engine\congratulate($name);
}

function getCorrectAnswer(int $num1, int $num2, string $operation): int
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
