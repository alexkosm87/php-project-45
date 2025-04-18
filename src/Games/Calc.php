<?php

namespace Games;

use Engine;

function getRandomOperation()
{
    $operations = ['+', '-', '*'];
    return $operations[array_rand($operations)];
}

function calculate($num1, $num2, $operation)
{
    if ($operation === '+') {
        return $num1 + $num2;
    } elseif ($operation === '-') {
        return $num1 - $num2;
    } elseif ($operation === '*') {
        return $num1 * $num2;
    }
}

function getQuestionAndAnswer()
{
    $num1 = rand(1, 50);
    $num2 = rand(1, 50);
    $operation = getRandomOperation();

    $question = "$num1 $operation $num2";
    $correctAnswer = calculate($num1, $num2, $operation);

    return [$question, (string)$correctAnswer];
}

function runGame()
{
    Engine\runGame('Games\getQuestionAndAnswer');
}
