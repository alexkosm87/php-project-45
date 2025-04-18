<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Prime
{
    private const ROUNDS = 3;

    public function run(): void // Указан тип возвращаемого значения
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        echo "Answer \"yes\" if given number is prime. Otherwise answer \"no\".\n";

        for ($i = 0; $i < self::ROUNDS; $i++) {
            $question = random_int(1, 100); // Генерируем случайное число от 1 до 100
            $correctAnswer = $this->isPrime($question) ? 'yes' : 'no';

            Engine::askQuestion((string)$question); // Приводим к строке для совместимости
            $userAnswer = Engine::getUserAnswer();

            if ($userAnswer !== $correctAnswer) {
                Engine::wrongAnswer($userAnswer, $correctAnswer, $name);
                return;
            }

            Engine::correctAnswer();
        }

        Engine::congratulate($name);
    }

    // Метод для проверки, является ли число простым
    public function isPrime(int $n): bool // Указан тип возвращаемого значения
    {
        if ($n < 2) {
            return false;
        }
        if ($n === 2) {
            return true; // 2 является простым числом
        }
        if ($n % 2 === 0) {
            return false; // Четные числа больше 2 не являются простыми
        }
        for ($i = 3; $i <= sqrt($n); $i += 2) {
            if ($n % $i === 0) {
                return false; // Если n делится на i, то не простое
            }
        }
        return true; // Если ни одно из условий не выполнено, то n простое
    }
}
