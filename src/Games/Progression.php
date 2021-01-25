<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 1;
const MAX_INTEGER = 10;
const COUNT_INTEGERS_IN_PROGRESSION = 10;

function getIntegers()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getProgression()
{
    $currInt = getIntegers();
    $step = getIntegers();
    $progression = [];

    for ($i = 0; $i <= COUNT_INTEGERS_IN_PROGRESSION; $i++) {
        $progression[] = $currInt;
        $currInt += $step;
    }
    return $progression;
}

function runProgression()
{
    $rules = "What number is missing in the progression?";

    $gameData = function (): array {
        $index = getIntegers();
        $progression = getProgression();
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';
        $question = implode(' ', $progression);

        return [$question, (string) $correctAnswer];
    };
    flow($gameData, $rules);
}
