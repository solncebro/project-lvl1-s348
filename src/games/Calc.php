<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What is the result of the expression?';

function runCalc()
{
    $createQuestion = function () {
        $operations = ['+', '-', '*'];
        $currOperation = array_rand($operations, 1);
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        switch ($operations[$currOperation]) {
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
        return [$question, $rightAnswer];
    };

    run(DESCRIPTION, $createQuestion);
}
