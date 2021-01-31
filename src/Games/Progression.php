<?php

namespace BrainGames\Games\Progression;

use function Brain\Games\Engine\flow;

const MIN_START = 2;
const MAX_START = 20;
const MIN_STEP = 2;
const MAX_STEP = 20;
const MIN_INDEX = 0;
const MAX_INDEX = 10;
const RULES = "What number is missing in the progression?";

function getProgression($start, $step)
{
    for ($i = 0, $progression = []; $i < MAX_INDEX; $i++) {
        $progression[] = $start;
        $start += $step;
    }
    return $progression;
}

function run()
{
    $gameData = function (): array {
        $start = random_int(MIN_START, MAX_START);
        $step = random_int(MIN_STEP, MAX_STEP);
        $index = random_int(MIN_INDEX, MAX_INDEX);
        $progression = getProgression($start, $step);
        $correctAnswer = $progression[$index];
        $progression[$index] = '..';
        $question = implode(' ', $progression);

        return [$question, (string) $correctAnswer];
    };
    flow($gameData, RULES);
}
