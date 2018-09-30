<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const TRIES = 3;

function run($gameDescription, $createQuestion)
{
    line('Welcome to the Brain Game!');
    line($gameDescription);

    $name = prompt('May I have your name?');
    define('NAME', $name);
    line("Hello, %s!", $name);

    game($createQuestion);
}

function game($createQuestion)
{
    for ($i = 0; $i < TRIES; $i++) {
        [$question, $rightAnswer] = $createQuestion();

        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        
        if ($rightAnswer === $userAnswer) {
            line('Correct!');
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $userAnswer, $rightAnswer);
            line('Let\'s try again, %s!', NAME);
            exit;
        }
    }
    line('Congratulations, %s!', NAME);
}
