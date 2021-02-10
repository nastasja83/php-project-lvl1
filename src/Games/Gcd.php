<?php

namespace BrainGames\Games\Gcd;

use function Brain\Games\Engine\play;

const MIN_INTEGER = 2;
const MAX_INTEGER = 50;
const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function getInteger(): int
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getGcd(int $int1, int $int2): int
{
    $temp = 0;

    while ($int2 != 0) {
        $temp = $int2;
        $int2 = $int1 % $int2;
        $int1 = $temp;
    }
    return $int1;
}

function run(): void
{
    $gameData = function (): array {
        $int1 = getInteger();
        $int2 = getInteger();
        $question = "{$int1} {$int2}";
        $correctAnswer = getGcd($int1, $int2);

        return [$question, (string) $correctAnswer];
    };
    play($gameData, DESCRIPTION);
}
