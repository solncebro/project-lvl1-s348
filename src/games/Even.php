<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\game;

function createQuestion()
{
    $question = rand(1, 20);
    $rightAnswer = isEven($question) ? 'no' : 'yes';

    return [$question, $rightAnswer];
}

function isEven($num)
{
    return $num % 2;
}

function checkAnswer($rightAnswer, $userAnswer)
{
    return $rightAnswer == $userAnswer ? true : false;
}
