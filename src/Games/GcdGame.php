<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

function runGcdGame(string $name): void
{
    const ROUNDS = 3;

    echo "Find the greatest common divisor of given numbers.\n";

    for ($i = 0; $i < ROUNDS; $i++) {
        $num1 = random_int(1, 100);
        $num2 = random_int(1, 100);
        $correctAnswer = gcd($num1, $num2);

        $question = "$num1 $num2";
        Engine\askQuestion($question);
        $userAnswer = Engine\getUserAnswer();

        if ($userAnswer !== (string)$correctAnswer) {
            Engine\wrongAnswer($userAnswer, (string)$correctAnswer, $name);
            return;
        }

        Engine\correctAnswer();
    }

    Engine\congratulate($name);
}

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
