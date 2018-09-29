<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\run;

function runCalc()
{
    $gameName = 'Calc';
    $gameMessage = 'What is the result of the expression?';

    $createQuestion = function ($step) {
        $randomNumber1 = rand(1, 99);
        $randomNumber2 = rand(1, 99);
        switch ($step) {
            case 0:
                $question = "{$randomNumber1}" . " + " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 + $randomNumber2;
                break;
            case 1:
                $question = "{$randomNumber1}" . " - " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 - $randomNumber2;
                break;
            case 2:
                $question = "{$randomNumber1}" . " * " . "{$randomNumber2}";
                $rightAnswer = $randomNumber1 * $randomNumber2;
                break;
        }
        return [$question, $rightAnswer];
    };

    run($gameName, $gameMessage, $createQuestion);
}
