<?php

namespace PhpProject45\Cli;

function greetUser() {
    echo "Welcome to the Brain Games!\n";
    echo "May I have your name?\n";
    
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!\n";
}

