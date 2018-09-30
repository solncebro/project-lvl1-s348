<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What number is missing in this progression?';
define('FIRST_NUMBER', rand(5, 15));

function runProgression()
{
    $createQuestion = function () {
        $stepProgression = rand(2, 10);
        $lenghtRow = 10;

        $progression = buildProgression(FIRST_NUMBER, $stepProgression, $lenghtRow);
       
        $keyRandNum = array_rand($progression);
        $rightAnswer = $progression[$keyRandNum];
        
        $progression[$keyRandNum] = '..';
        $question = implode(' ', $progression);

        return [$question, (string)$rightAnswer];
    };

    run(DESCRIPTION, $createQuestion);
}

function buildProgression($firstNumber, $stepProgression, $lenghtRow)
{
    for ($i = 0; $i < $lenghtRow; $i++) {
        $numArr[] = $firstNumber + $stepProgression * $i;
    }

     return $numArr;
}
