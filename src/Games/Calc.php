<?php

namespace Games;

use function Engine\runGame;

const DESCRIPTION = 'What is the result of the expression?';

function calculate(int $num1, int $num2, string $operation): int
{
    return match ($operation) {
        '+' => $num1 + $num2,
        '-' => $num1 - $num2,
        '*' => $num1 * $num2,
        default => throw new \InvalidArgumentException("Unsupported operation: $operation"),
    };
}

function generateQuestionAndAnswer(): array
{
    $num1 = random_int(1, 50);
    $num2 = random_int(1, 50);
    $operations = ['+', '-', '*'];
    $operation = $operations[array_rand($operations)];

    $question = "$num1 $operation $num2";
    $correctAnswer = (string) calculate($num1, $num2, $operation);

    return [$question, $correctAnswer];
}

function runGame(): void
{
    runGame(__NAMESPACE__ . '\generateQuestionAndAnswer', DESCRIPTION);
}
