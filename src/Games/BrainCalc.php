<?php

namespace Games;

class BrainCalc
{
    public function getQuestionAndAnswer()
    {
        $num1 = mt_rand(1, 50);
        $num2 = mt_rand(1, 50);
        $operations = ['+', '-', '*'];
        $operation = $operations[array_rand($operations)];

        $question = "$num1 $operation $num2";
        $correctAnswer = $this->calculate($num1, $num2, $operation);

        return [$question, $correctAnswer];
    }

    private function calculate($num1, $num2, $operation)
    {
        switch ($operation) {
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            default:
                throw new Exception("Unknown operation: $operation");
        }
    }
}

