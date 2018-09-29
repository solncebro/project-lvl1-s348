<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Cli\run;

function runGCD()
{
    $gameName = 'GCD';
    $gameMessage = 'Find the greatest common divisor of given numbers.';


    $createQuestion = function () {
        $randomNumber1 = rand(1, 99);
        $randomNumber2 = rand(1, 99);
        $rightAnswer = nod($randomNumber1, $randomNumber2);
        $question = "{$randomNumber1}" . " " . "{$randomNumber2}";

        return [$question, $rightAnswer];
    };

    run($gameName, $gameMessage, $createQuestion);
}

function nod($num1, $num2)
{
    $numDividers1 = dividers($num1);
    $numDividers2 = dividers($num2);
    return max(array_intersect($numDividers1, $numDividers2));
}

function dividers($num)
{
    $dividers = [];
    for ($i = 1; $i <= $num / 2; $i++) {
        if (isDivider($num, $i)) {
            $dividers[] = $i;
        }
    }
    return $dividers;
}

function isDivider($num, $divider)
{
    return $num % $divider ? false : true;
}
