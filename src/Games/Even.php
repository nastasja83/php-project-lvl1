<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 1;
const MAX_INTEGER = 100;

function getQuestion()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function isEven($int)
{
    return $int % 2 === 0 ? 'yes' : 'no';
}

function runEven()
{
    $rules = "Answer 'yes' if the number is even, otherwise answer 'no'.";

    $gameData = function (): array {
        $question = getQuestion();
        $correctAnswer = isEven($question);
        return [$question, (string) $correctAnswer];
    };
    flow($gameData, $rules);
}
