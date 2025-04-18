<?php

namespace PhpProject45\Games;

use function PhpProject45\runGame;

function getRandomExpression()
{
    $operations = ['+', '-', '*'];
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = $operations[array_rand($operations)];

    return [$num1, $num2, $operation];
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
    }
}

function playCalcGame()
{
    [$num1, $num2, $operation] = getRandomExpression();
    $question = "{$num1} {$operation} {$num2}";
    $correctAnswer = calculate($num1, $num2, $operation);

    return [$question, $correctAnswer];
}

function startGame()
{
    runGame('PhpProject45\Games\playCalcGame');
}
