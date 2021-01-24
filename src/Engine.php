<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_OF_ATTEMPTS = 3;

function flow(callable $gameData, string $rules)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("$rules");

    for ($attempt = 1; $attempt <= COUNT_OF_ATTEMPTS; $attempt += 1) {
        [$question, $correctAnswer] = $gameData();
        line("Question: {$question}");
        $answer = strtolower(prompt('Your answer'));

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulation, %s!", $name);
}
