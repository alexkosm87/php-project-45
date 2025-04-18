<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

function runPrimeGame(string $name): void
{
    const ROUNDS = 3;

    echo "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

    for ($i = 0; $i < ROUNDS; $i++) {
        $question = random_int(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        Engine\askQuestion($question);
        $userAnswer = Engine\getUserAnswer();

        if ($userAnswer !== $correctAnswer) {
            Engine\wrongAnswer($userAnswer, $correctAnswer, $name);
            return;
        }

        Engine\correctAnswer();
    }

    Engine\congratulate($name);
}

function isPrime(int $n): bool
{
    if ($n < 2) {
        return false;
    }
    if ($n === 2) {
        return true;
    }
    if ($n % 2 === 0) {
        return false;
    }
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }
    return true;
}
