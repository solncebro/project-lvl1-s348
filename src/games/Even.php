<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

function runEven()
{
    $createQuestion = function () {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    run($createQuestion);
}

function isEven($num)
{
    return $num % 2 === 0;
}
