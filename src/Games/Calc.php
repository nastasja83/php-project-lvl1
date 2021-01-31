<?php

namespace BrainGames\Games\Calc;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 2;
const MAX_INTEGER = 30;
const OPERATORS = ['+', '-', '*'];
const RULES = "What is the result of the expression?";

function getIntegers(): int
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getOperator(): string
{
    $key = array_rand(OPERATORS);
    return OPERATORS[$key];
}

function getVariant(int $int1, int $int2, string $operator): array
{
    switch ($operator) {
        case '+':
            $question = "{$int1} + {$int2}";
            $correctAnswer = $int1 + $int2;
            break;
        case '-':
            $question = "{$int1} - {$int2}";
            $correctAnswer = $int1 - $int2;
            break;
        case '*':
            $question = "{$int1} * {$int2}";
            $correctAnswer = $int1 * $int2;
            break;
    }
    return [$question, (string) $correctAnswer];
}

function run(): void
{
    $gameData = function (): array {
        $int1 = getIntegers();
        $int2 = getIntegers();
        $operator = getOperator();
        return getVariant($int1, $int2, $operator);
    };
    flow($gameData, RULES);
}
