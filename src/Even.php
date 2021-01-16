<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function isEven()
{
    $answerIfEven = 'yes';
    $answerIfOdd = 'no';
    $minInt = 1;
    $maxInt = 20;
    $integers = range($minInt, $maxInt);
    shuffle($integers);
    $countOfAttempts = 3;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer '{$answerIfEven}' if the number is even, otherwise answer '{$answerIfOdd}'.");

    for ($attempt = 1; $attempt <= $countOfAttempts; $attempt++) {
        $intForQuestion = array_pop($integers);
        line("Question: {$intForQuestion}");
        $currAnswer = strtolower(prompt('Your answer'));

        if ($intForQuestion % 2 === 0 && $currAnswer === $answerIfEven) {
            line("Correct!");
        } elseif ($intForQuestion % 2 !== 0 && $currAnswer === $answerIfOdd) {
            line("Correct!");
        } elseif ($intForQuestion % 2 !== 0 && $currAnswer === $answerIfEven) {
            line("'{$answerIfEven}' is wrong answer ;(. Correct answer was '{$answerIfOdd}'.");
            line("Let's try again, %s!", $name);
            break;
        } elseif ($intForQuestion % 2 === 0 && $currAnswer === $answerIfOdd) {
            line("'{$answerIfOdd}' is wrong answer ;(. Correct answer was '{$answerIfEven}'.");
            line("Let's try again, %s!", $name);
            break;
        } else {
            line("Answer '{$answerIfEven}' or '{$answerIfOdd}'.");
            line("Let's try again, %s!", $name);
            break;
        }
        if ($attempt === $countOfAttempts) {
            line("Congratulation, %s!", $name);
        }
    }
}
