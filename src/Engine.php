<?php

namespace BrainGames\Engine;
use function BrainGames\Cli\{welcome, greating, game};

const GAMES_MESSAGES = [
    'even' => 'Answer "yes" if number even otherwise answer "no".',
    'calc' => 'What is the result of the expression?'
];

function run()
{
    $posDash = strripos('-', $_SERVER['SCRIPT_NAME']);
    define("GAME_NAME", strstr($_SERVER['SCRIPT_NAME'], $posDash + 1));

    if (GAME_NAME == 'brain-games') {
        greating();
    } else {
        if (GAME_NAME == 'brain-even') {
            $game = "Even";
            line();
        } elseif (GAME_NAME == 'brain-calc') {
            $game = "Calc";
            line();
        }
        
        greating();

        $createQuestion = "BrainGames\Games\\" . $game . "\createQuestion";
        $checkAnswer = "BrainGames\Games\\" . $game . "\checkAnswer";
        game($createQuestion, $checkAnswer);
    }  
}