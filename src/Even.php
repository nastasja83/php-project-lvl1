<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven($int)
{
    if ($int % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function getIntegers($minInt, $maxInt)
{
    $integers = range($minInt, $maxInt);
    return shuffle($integers);
}

function evenOrOdd()
{
    $minInt = 1;
    $maxInt = 20;
    $integers = getIntegers($minInt, $maxInt);
    $countOfAttempts = 3;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer 'yes' if the number is even, otherwise answer 'no'.");

    for ($attempt = 1; $attempt <= $countOfAttempts; $attempt += 1) {
        $intForQuestion = array_pop($integers);
        line("Question: {$intForQuestion}");
        $answer = strtolower(prompt('Your answer'));
        $currectAnswer = isEven($intForQuestion);

        if ($answer === $currectAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$currectAnswer}'.");
            line("Let's try again, %s!", $name);
            break;
        }
        if ($attempt === $countOfAttempts) {
            line("Congratulation, %s!", $name);
        }
    }
}
