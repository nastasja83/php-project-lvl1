<?php

namespace BrainGames\Games\Calc;

use function Brain\Games\Engine\play;

const MIN_INTEGER = 2;
const MAX_INTEGER = 30;
const OPERATORS = ['+', '-', '*'];
const DESCRIPTION = "What is the result of the expression?";

function getInteger(): int
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getOperator(): string
{
    $key = array_rand(OPERATORS);
    return OPERATORS[$key];
}

function getExpressionValue(int $int1, int $int2, string $operator): array
{
    $question = "";
    $correctAnswer = 0;

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
        $int1 = getInteger();
        $int2 = getInteger();
        $operator = getOperator();
        return getExpressionValue($int1, $int2, $operator);
    };
    play($gameData, DESCRIPTION);
}
