<?php

namespace BrainGames\Games\Parity;

use function BrainGames\Cli\question;
use function BrainGames\Cli\answer;
use function BrainGames\Cli\correct;
use function BrainGames\Cli\wrong;
use function BrainGames\Cli\congratulations;

function runEven()
{
    $rightAnswers = 0;
    $requireRightAnswers = 3;
    do {
        $score = even();
        if ($score) {
            $rightAnswers++;
        }
    } while ($requireRightAnswers > $rightAnswers);
    congratulations();
}

function even()
{
    $randomNumber = rand(1, 20);
    $parity = $randomNumber % 2;
    if ($parity != 0) {
        $rightAnswer = 'no';
    } else {
        $rightAnswer = 'yes';
    }

    question($randomNumber);
    $answer = answer();


    if ($rightAnswer == $answer) {
        correct();
        return true;
    } else {
        wrong($answer, $rightAnswer);
        return false;
    }
}
