<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\question;
use function BrainGames\Cli\answer;
use function BrainGames\Cli\correct;
use function BrainGames\Cli\wrong;
use function BrainGames\Cli\congratulations;

function runCalc()
{
    $rightAnswers = 0;
    $requireRightAnswers = 3;
    $gameArg = '';
    do {
        switch ($rightAnswers) {
            case 0:
                $gameArg = '+';
                break;
            case 1:
                $gameArg = '-';
                break;
            case 2:
                $gameArg = '*';
                break;
        }

        $score = calc($gameArg);
        if ($score) {
            $rightAnswers++;
        }
    } while ($requireRightAnswers > $rightAnswers);
    congratulations();
}

function calc($gameArg)
{
    $randomNumber1 = rand(1, 99);
    $randomNumber2 = rand(1, 99);
    switch ($gameArg) {
        case '+':
            $rightAnswer = $randomNumber1 + $randomNumber2;
            break;
        case '-':
            $rightAnswer = $randomNumber1 - $randomNumber2;
            break;
        case '*':
            $rightAnswer = $randomNumber1 * $randomNumber2;
            break;
    }

    question("$randomNumber1 $gameArg $randomNumber2");
    $answer = answer();


    if ($rightAnswer == $answer) {
        correct();
        return true;
    } else {
        wrong($answer, $rightAnswer);
        return false;
    }
}
