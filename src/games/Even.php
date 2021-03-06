<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function runEven()
{
    $createQuestion = function () {
        $question = rand(1, 20);
        $rightAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    run(DESCRIPTION, $createQuestion);
}

function isEven($num)
{
    return $num % 2 === 0;
}
