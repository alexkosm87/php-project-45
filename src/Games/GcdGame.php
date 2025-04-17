<?php

namespace Games;

class GcdGame
{
    public function gcd($a, $b)
    {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return $a;
    }

    public function play()
    {
        echo "Welcome to the Brain Games!\n";
        echo "May I have your name? ";
        $name = trim(fgets(STDIN));
        echo "Hello, $name!\n";
        echo "Find the greatest common divisor of given numbers.\n";

        for ($i = 0; $i < 3; $i++) {
            $num1 = rand(1, 100);
            $num2 = rand(1, 100);
            $correctAnswer = $this->gcd($num1, $num2);

            echo "Question: $num1 $num2\n";
            echo "Your answer: ";
            $userAnswer = trim(fgets(STDIN));

            if ($userAnswer == $correctAnswer) {
                echo "Correct!\n";
            } else {
                echo "'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\n";
                echo "Let's try again, $name!\n";
                return;
            }
        }

        echo "Congratulations, $name!\n";
    }
}
