<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\run;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime()
{
    $createQuestion = function () {
        $question = rand(2, 20);
        $rightAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $rightAnswer];
    };

    run(DESCRIPTION, $createQuestion);
}

function isPrime($num)
{
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}
