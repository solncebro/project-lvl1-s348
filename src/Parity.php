<?php

namespace BrainGames\Parity;

use function \cli\line;
use function \cli\prompt;

function gameParity()
{
    $rightAnswer = 0;
    $requireRightAnswers = 3;
    do {
        $score = parity();
        if ($score) {
            $rightAnswer++;
        }
    } while ($requireRightAnswers > $rightAnswer);
    line('Congratulations, %s', NAME);
}

function parity()
{
    $randomNumber = rand(0, 20);
    $parity = $randomNumber % 2;
    if ($parity != 0) {
        $rightAnswer = 'no';
    } else {
        $rightAnswer = 'yes';
    }

    line('Question: %s', $randomNumber);
    $answer = prompt('Your answer: ');


    if ($rightAnswer == $answer) {
        line('Correct!');
        return true;
    } else {
        line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
        line('Let\'s try again, %s!', NAME);
        return false;
    }
}
