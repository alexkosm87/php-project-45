<?php

namespace Games\Prime;

use function Engine\runGame;

const PRIME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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

function runPrimeGame(): void
{
    $generatePrimeQuestionAndAnswer = function (): array {
        $number = random_int(1, 100);
        $question = (string) $number;
        $correctAnswer = isPrime($number) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    runGame($generatePrimeQuestionAndAnswer, PRIME_DESCRIPTION);
}
