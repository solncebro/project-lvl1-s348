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
