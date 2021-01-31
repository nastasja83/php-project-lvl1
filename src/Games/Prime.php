<?php

namespace BrainGames\Games\Prime;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 1;
const MAX_INTEGER = 20;
const RULES = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function getIntegers()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function isPrime($int)
{
    if ($int === 1) {
        return 'no';
    }
    for ($i = 2; $i * $i <= $int; $i++) {
        if ($int % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function run()
{
    $gameData = function (): array {
        $question = getIntegers();
        $correctAnswer = isPrime($question);

        return [$question, (string) $correctAnswer];
    };
    flow($gameData, RULES);
}
