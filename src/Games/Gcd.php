<?php

namespace BrainGames\Games\Gcd;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 2;
const MAX_INTEGER = 50;
const RULES = "Find the greatest common divisor of given numbers.";

function getIntegers()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getCorrectAnswer($int1, $int2)
{
    while ($int1 !== $int2) {
        if ($int1 > $int2) {
            $int1 -= $int2;
        } else {
            $int2 -= $int1;
        }
    }
    return $int1;
}

function run()
{
    $gameData = function (): array {
        $int1 = getIntegers();
        $int2 = getIntegers();
        $question = "{$int1} {$int2}";
        $correctAnswer = getCorrectAnswer($int1, $int2);

        return [$question, (string) $correctAnswer];
    };
    flow($gameData, RULES);
}
