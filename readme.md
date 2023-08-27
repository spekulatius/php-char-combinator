
```php
$startLevels = 1; // Change this value as needed
$endLevels = 3;   // Change this value as needed

$combinator = new Combinator();
$generatedCombinations = $combinator->generateCombinations($startLevels, $endLevels);

foreach ($generatedCombinations as $combination) {
    echo $combination . "\n";
}
```