<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_WIN = 3;

function run($createQuestion)
{
    line('Welcome to the Brain Game!');
    line(DESCRIPTION);

    $name = prompt('May I have your name?');
    define('NAME', $name);
    line("Hello, %s!", $name);

    game($createQuestion);
}

function game($createQuestion)
{
    for ($i = 0; $i < ANSWERS_FOR_WIN;) {
        [$question, $rightAnswer] = $createQuestion($i);

        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        
        if ($rightAnswer == $userAnswer) {
            line('Correct!');
            $i++;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $userAnswer, $rightAnswer);
            line('Let\'s try again, %s!', NAME);
        }
    }
    line('Congratulations, %s!', NAME);
}
