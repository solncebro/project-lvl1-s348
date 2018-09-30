<?php

namespace BrainGames\Games\Balance;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Balance the given number.';

function runBalance()
{
    $createQuestion = function () {
        $randomNumber = rand(100, 999);
        $question = $randomNumber;
        $rightAnswer = balanced($randomNumber);

        return [$question, (string)$rightAnswer];
    };
    
    run(DESCRIPTION, $createQuestion);
}

function balanced($num)
{
    $numArr = str_split($num);
    do {
        $minNumKey = array_search(min($numArr), $numArr);
        $maxNumKey = array_search(max($numArr), $numArr);
        $diff = $numArr[$maxNumKey] - $numArr[$minNumKey];
        if ($diff > 1) {
            $numArr[$minNumKey]++;
            $numArr[$maxNumKey]--;
        }
    } while ($diff > 1);
    asort($numArr);
    return implode('', $numArr);
}
