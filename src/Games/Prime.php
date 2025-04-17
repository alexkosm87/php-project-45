<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Prime
{
    private const ROUNDS = 3;

    public function run()
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        Engine::askQuestion("Answer 'yes' if given number is prime. Otherwise answer 'no'.");

        for ($i = 0; $i < self::ROUNDS; $i++) {
            $question = $this->generateQuestion();
            $correctAnswer = $this->isPrime($question) ? 'yes' : 'no';

            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            if ($userAnswer !== $correctAnswer) {
                Engine::wrongAnswer($userAnswer, $correctAnswer, $name);
                return;
            }

            Engine::correctAnswer();
        }

        Engine::congratulate($name);
    }

    private function generateQuestion(): int
    {
        return random_int (1, 100); // Генерируем случайное число от 1 до 100
    }

    private function isPrime(int $n): bool
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
}
