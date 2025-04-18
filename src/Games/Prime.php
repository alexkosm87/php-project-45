<?php

namespace PhpProject45\Games;

use function PhpProject45\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
{
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function generatePrimeQuestionAndAnswer(): array
{
    $number = rand(1, 100);
    $question = (string) $number;
    $correctAnswer = isPrime($number) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function runPrimeGame(): void
{
    runGame(__NAMESPACE__ . '\generatePrimeQuestionAndAnswer', DESCRIPTION);
}
