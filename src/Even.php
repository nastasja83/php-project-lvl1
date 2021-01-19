<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

const COUNT_OF_ATTEMPTS = 3;

function isEven($int)
{
    if ($int % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function evenOrOdd()
{
    $minInt = 1;
    $maxInt = 20;
    $integers = range($minInt, $maxInt);
    shuffle($integers);

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("Answer 'yes' if the number is even, otherwise answer 'no'.");

    for ($attempt = 1; $attempt <= COUNT_OF_ATTEMPTS; $attempt += 1) {
        $question = array_pop($integers);
        line("Question: {$question}");
        $answer = strtolower(prompt('Your answer'));
        $currectAnswer = isEven($question);

        if ($answer === $currectAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$currectAnswer}'.");
            line("Let's try again, %s!", $name);
            break;
        }
        if ($attempt === COUNT_OF_ATTEMPTS) {
            line("Congratulation, %s!", $name);
        }
    }
}
