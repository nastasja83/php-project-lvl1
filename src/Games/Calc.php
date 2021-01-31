<?php

namespace BrainGames\Games\Calc;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 2;
const MAX_INTEGER = 30;
const OPERATORS = ['+', '-', '*'];
const RULES = "What is the result of the expression?";

function getIntegers()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getOperator()
{
    return array_rand(array_flip(OPERATORS));
}

function getVariant($int1, $int2, $operator)
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

function run()
{
    $gameData = function (): array {
        $int1 = getIntegers();
        $int2 = getIntegers();
        $operator = getOperator();
        return getVariant($int1, $int2, $operator);
    };
    flow($gameData, RULES);
}
