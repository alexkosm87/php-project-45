<?php

namespace Games;

use function Engine\runGame;

const DESCRIPTION = 'What is the result of the expression?';

function getRandomOperation()
{
    $operations = ['+', '-', '*'];
    return $operations[array_rand($operations)];
}

function calculate($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \InvalidArgumentException("Unsupported operation: $operation");
    }
}

function generateQuestionAndAnswer()
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = getRandomOperation();

    $question = "$num1 $operation $num2";
    $correctAnswer = (string) calculate($num1, $num2, $operation);

    return [$question, $correctAnswer];
}

function runCalcGame(): void
{
    runGame('Games\generateQuestionAndAnswer', DESCRIPTION);
}
