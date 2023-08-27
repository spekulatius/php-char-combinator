<?php
function generateCombinations($startLevels, $endLevels) {
    // Create an array of all ASCII characters
    $asciiChars = [];
    for ($i = 0; $i <= 127; $i++) {
        $asciiChars[] = chr($i);
    }

    // Generate combinations based on parameters
    $combinations = [];
    for ($length = $startLevels; $length <= $endLevels; $length++) {
        generateCombinationsRecursive($combinations, $asciiChars, '', $length);
    }

    return $combinations;
}

function generateCombinationsRecursive(&$combinations, $characters, $currentCombination, $length) {
    if ($length === 0) {
        $combinations[] = $currentCombination;
        return;
    }

    foreach ($characters as $char) {
        generateCombinationsRecursive($combinations, $characters, $currentCombination . $char, $length - 1);
    }
}

$startLevels = 1; // Change this value as needed
$endLevels = 3;   // Change this value as needed

$generatedCombinations = generateCombinations($startLevels, $endLevels);

// Print the generated combinations
foreach ($generatedCombinations as $combination) {
    echo $combination . "\n";
}
?>
