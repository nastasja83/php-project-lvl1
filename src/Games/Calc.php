<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\flow;

const MIN_INTEGER = 2;
const MAX_INTEGER = 30;
const OPERATORS = ['+', '-', '*'];

function getIntegers()
{
    return random_int(MIN_INTEGER, MAX_INTEGER);
}

function getOperator()
{
    return array_rand(array_flip(OPERATORS));
}

function runCalc()
{
    $rules = "What is the result of the expression?";

    $gameData = function (): array {
        $int1 = getIntegers();
        $int2 = getIntegers();
        $operator = getOperator();

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
    };
    flow($gameData, $rules);
}
