<?php

namespace BrainGames\Games\Prime;

use function Brain\Games\Engine\play;

const MIN_INTEGER = 1;
const MAX_INTEGER = 20;
const DESCRIPTION = "Answer 'yes' if given number is prime. Otherwise answer 'no'.";

function getInteger(): int
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function isPrime(int $int): bool
{
    if ($int === 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $int; $i++) {
        if ($int % $i === 0) {
            return false;
        }
    }
    return true;
}

function getCorrectAnswer(int $int): string
{
    return isPrime($int) ? 'yes' : 'no';
}

function run(): void
{
    $gameData = function (): array {
        $question = getInteger();
        $correctAnswer = getCorrectAnswer($question);

        return [$question, $correctAnswer];
    };
    play($gameData, DESCRIPTION);
}
