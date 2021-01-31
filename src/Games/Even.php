<?php

namespace BrainGames\Games\Even;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 1;
const MAX_INTEGER = 100;
const RULES = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function getQuestion()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function isEven($int)
{
    return $int % 2 === 0;
}

function getCorrectAnswer($int)
{
    return isEven($int) ? 'yes' : 'no';
}

function run()
{
    $gameData = function (): array {
        $question = getQuestion();
        $correctAnswer = getCorrectAnswer($question);
        return [$question, (string) $correctAnswer];
    };
    flow($gameData, RULES);
}
