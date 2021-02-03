<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const ATTEMPTS_COUNT = 3;

function play(callable $gameData, string $description): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("$description");

    for ($attempt = 0; $attempt < ATTEMPTS_COUNT; $attempt += 1) {
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
    line("Congratulations, %s!", $name);
}
