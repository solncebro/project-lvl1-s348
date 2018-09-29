<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

function runEven()
{
    $gameName = 'Even';
    $gameMessage = 'Answer "yes" if number even otherwise answer "no".';


    $createQuestion = function () {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? 'no' : 'yes';

        return [$question, $rightAnswer];
    };

    run($gameName, $gameMessage, $createQuestion);
}

function isEven($num)
{
    return $num % 2;
}
