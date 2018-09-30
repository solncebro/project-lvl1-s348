<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\run;

const DESCRIPTION = 'What number is missing in this progression?';

function runProgression()
{
    $createQuestion = function () {
        $firstNumber = rand(5, 15);
        $stepProgression = rand(2, 10);
        $lenghtRow = 10;

        $progression = buildProgression($firstNumber, $stepProgression, $lenghtRow);
       
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
    $numArr = [$firstNumber];
    $nextNumber = $firstNumber;

    for ($i = 0; $i < $lenghtRow; $i++) {
        $nextNumber += $stepProgression;
        $numArr[] = $nextNumber;
    }

     return $numArr;
}
