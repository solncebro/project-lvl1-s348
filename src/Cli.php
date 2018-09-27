<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

function run()
{
    line('Welcome to the Brain Game!');
}

function askName()
{
    $name = prompt('May I have your name?');
    define('NAME', $name);
    line("Hello, %s!", $name);
}

function descriptionParity()
{
    line('Answer "yes" if number even otherwise answer "no".');
}

function descriptionCalc()
{
    line('What is the result of the expression?');
}

function question($var)
{
    line('Question: %s', $var);
}

function answer()
{
    return prompt('Your answer: ');
}

function correct()
{
    line('Correct!');
}
function wrong($answer, $rightAnswer)
{
    line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $answer, $rightAnswer);
    line('Let\'s try again, %s!', NAME);
}

function congratulations()
{
    line('Congratulations, %s', NAME);
}
