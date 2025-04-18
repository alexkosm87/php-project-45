<?php

namespace PhpProject45\Games;

use PhpProject45\Engine;

class Progression
{
    private $_length;
    private $_start;
    private $_step;

    public function __construct()
    {
        $this->length = random_int(5, 10); // Длина прогрессии от 5 до 10
        $this->start = random_int(1, 10); // Начальное число
        $this->step = random_int(1, 5); // Шаг прогрессии
    }

    public function generateProgression(): array // Указываем тип возвращаемого значения
    {
        $progression = [];
        for ($i = 0; $i < $this->length; $i++) {
            $progression[] = $this->start + $i * $this->step;
        }
        return $progression;
    }

    public function run()
    {
        $name = Engine::getUserName();
        Engine::welcome($name);
        echo "What number is missing in the progression?\n";
        
        for ($i = 0; $i < 3; $i++) {
            $questionData = $this->getQuestion();
            $question = $questionData['question'];
            $correctAnswer = $questionData['answer'];

            Engine::askQuestion($question);
            $userAnswer = Engine::getUserAnswer();

            if ($userAnswer === $correctAnswer) { // Используем строгое сравнение
                Engine::correctAnswer();
            } else {
                Engine::wrongAnswer($userAnswer, $correctAnswer, $name);
                return;
            }
        }

        Engine::congratulate($name);
    }

    private function getQuestion(): array // Указываем тип возвращаемого значения
    {
        $progression = $this->generateProgression();
        $hiddenIndex = random_int(0, $this->length - 1);
        $correctAnswer = $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..'; // Заменяем число на '..'
        
        return [
            'question' => implode(' ', $progression),
            'answer' => (string) $correctAnswer // Приводим к строке
        ];
    }
}
