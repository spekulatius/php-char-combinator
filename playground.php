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

// Prep
$channel = $argv[1];
$reportingThreshold = 100000;
$result = [];

echo count($combinations)." combinations to test...\n";

foreach ($combinations as $index => $combination) {
    // Create the complete string to work with.
    $finalString = str_repeat($combination, 10000);

    // Track time usage.
    $start = microtime(true);

    // Place your tests here

    // End tracking
    $end = microtime(true);
    $duration = round(($end - $start) * 1000000, 2);

    if ($index / 1000 === (int) ($index / 1000) || $index < 25) {
        echo '['.date('Y-m-d H:i:s')."] Test #{$index}: {$duration} ms\n";
    }

    // Tweak the threshold above.
    if ($duration > $reportingThreshold) {
        $result[$combination] = $duration;
    }
}

file_put_contents('./'.$channel.'.json', json_encode($result, JSON_PRETTY_PRINT));
