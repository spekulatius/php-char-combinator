<?php

require __DIR__.'/vendor/autoload.php';

use Spekulatius\PHPCharCombinator\Combinator;

$combinator = new Combinator();

$combinations = $combinator->generateCombinations(
    // All chars, but not A-Z, 0-9
    $combinator->prepareNonAlphanumericAsciiChars(),

    // min length
    2,

    // max length
    3,
);

foreach ($combinations as $combination) {

}
