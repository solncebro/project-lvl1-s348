<?php

namespace BrainGames\Game;

use function BrainGames\Games\Calc\calc;

function runGame($gameName)
{
    $rightAnswers = 0;
    $requireRightAnswers = 3;
    $gameArg = '';
    do {
        if ($gameName == 'Calc') {
            switch ($rightAnswers) {
                case 0:
                    $gameArg = '+';
                    break;
                case 1:
                    $gameArg = '-';
                    break;
                case 2:
                    $gameArg = '*';
                    break;
            }
        }

        $score = $gameName($gameArg);
        if ($score) {
            $rightAnswers++;
        }
    } while ($requireRightAnswers > $rightAnswers);
    congratulations();
}
