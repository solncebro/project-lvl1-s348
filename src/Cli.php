<?php

namespace BrainGames\Cli;

use function \cli\line;
use function \cli\prompt;

const ANSWERS_FOR_WIN = 3;

function run()
{
    line('Welcome to the Brain Game!');
    $scriptPath = explode('/', $_SERVER['SCRIPT_NAME']);
    define("GAME_NAME", $scriptPath[sizeof($scriptPath) - 1]);

    if (GAME_NAME == 'brain-games') {
        greating();
    } else {
        if (GAME_NAME == 'brain-even') {
            $game = "Even";
            line('Answer "yes" if number even otherwise answer "no".');
        } elseif (GAME_NAME == 'brain-calc') {
            $game = "Calc";
            line('What is the result of the expression?');
        }
        
        greating();
        
        $createQuestion = "BrainGames\Games\\" . $game . "\createQuestion";
        $checkAnswer = "BrainGames\Games\\" . $game . "\checkAnswer";
        game($createQuestion, $checkAnswer);
    }
}

function greating()
{
    $name = prompt('May I have your name?');
    define('NAME', $name);
    line("Hello, %s!", $name);
}

function game($createQuestion, $checkAnswer)
{
    for ($i = 0; $i < ANSWERS_FOR_WIN;) {
        [$question, $rightAnswer] = $createQuestion();

        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');
        
        if ($checkAnswer($rightAnswer, $userAnswer)) {
            line('Correct!');
            $i++;
        } else {
            line('\'%s\' is wrong answer ;(. Correct answer was \'%s\'', $userAnswer, $rightAnswer);
            line('Let\'s try again, %s!', NAME);
        }
    }
    line('Congratulations, %s!', NAME);
}
