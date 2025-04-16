<?php

namespace Games\BrainCalc;

use function Engine\runGame;

function getRandomExpression()
{
    $operations = ['+', '-', '*'];
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = $operations[array_rand($operations)];

    return [$num1, $num2, $operation];
}

function calculateAnswer($num1, $num2, $operation)
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

function play()
{
    $gameLogic = [
        'question' => function () {
            [$num1, $num2, $operation] = getRandomExpression();
            return "$num1 $operation $num2";
        },
        'answer' => function ($question) {
            [$num1, $num2, $operation] = explode(' ', $question);
            return calculateAnswer((int)$num1, (int)$num2, $operation);
        },
    ];

    runGame($gameLogic);
}

