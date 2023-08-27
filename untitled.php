<?php
// Create an array of all ASCII characters
$asciiChars = [];
for ($i = 0; $i <= 127; $i++) {
    $asciiChars[] = chr($i);
}

// Generate all possible 2-3 letter combinations
$combinations = [];
foreach ($asciiChars as $char1) {
    foreach ($asciiChars as $char2) {
        $combinations[] = $char1 . $char2;
        foreach ($asciiChars as $char3) {
            $combinations[] = $char1 . $char2 . $char3;
        }
    }
}

// Print the combinations
foreach ($combinations as $combination) {
    echo $combination . "\n";
}
?>
