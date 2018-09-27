<?php

namespace BrainGames\Games\Parity;

use function \cli\line;
use function \cli\prompt;

function gameParity()
{
    $func = 'parity';
    $rightAnswers = 0;
    $requireRightAnswers = 3;
    do {
        $score = $func($ar);
        if ($score) {
            $rightAnswers++;
        }
    } while ($requireRightAnswers > $rightAnswers);
    line('Congratulations, %s', NAME);
}

function parity()
{
    $randomNumber = rand(1, 20);
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
