<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What is the result of the expression?';
const MATHOPERATIONS = ['+', '-', '*'];

function runCalc()
{
    $createQuestion = function () {
        $currOperation = array_rand(MATHOPERATIONS, 1);
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        switch (MATHOPERATIONS[$currOperation]) {
            case '+':
                $question = "{$randomNumber1}" . " + " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 + $randomNumber2;
                break;
            case '-':
                $question = "{$randomNumber1}" . " - " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 - $randomNumber2;
                break;
            case '*':
                $question = "{$randomNumber1}" . " * " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 * $randomNumber2;
                break;
        }
        return [$question, (string)$rightAnswer];
    };

    run(DESCRIPTION, $createQuestion);
}
