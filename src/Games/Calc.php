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
            $question = $this->_generateQuestion();
            $correctAnswer = $this->_calculateAnswer($question);

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

    private function _generateQuestion(): string
    {
        $num1 = random_int(1, 50);
        $num2 = random_int(1, 50);
        $operation = self::OPERATIONS[array_rand(self::OPERATIONS)];

        return "$num1 $operation $num2";
    }

    private function _calculateAnswer(string $question): int
    {
        list($num1, $operation, $num2) = explode(' ', $question);
        $num1 = (int)$num1; // Приведение к типу int
        $num2 = (int)$num2; // Приведение к типу int

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
