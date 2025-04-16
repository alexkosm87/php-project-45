<?php

namespace Brain\Games;

class Calculator
{
    public function getQuestion()
    {
        $num1 = rand(1, 50);
        $num2 = rand(1, 50);
        $operation = $this->getRandomOperation();
        return "$num1 $operation $num2";
    }

    public function getCorrectAnswer($question)
    {
        eval('$result = ' . $question . ';');
        return $result;
    }

    private function getRandomOperation()
    {
        $operations = ['+', '-', '*'];
        return $operations[array_rand($operations)];
    }
}

