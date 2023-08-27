<?php

namespace Spekulatius\PHPCharCombinator;

class Combinator
{
    /**
     * Creates an array of all possible combinations with a certain length range.
     *
     * @param array<string> $chars
     */
    public function generateCombinations(array $chars, int $startLevels, int $endLevels): array
    {
        // Initialize an array to store the generated combinations
        $combinations = [];

        // Generate combinations for each length from $startLevels to $endLevels
        for ($length = $startLevels; $length <= $endLevels; $length++) {
            $this->generateCombinationsRecursive($combinations, $chars, '', $length);
        }

        // Return the generated combinations
        return $combinations;
    }

    /**
     * One possible provider of data for the list.
     *
     * @return string[]
     */
    protected function generateAsciiChars(): array
    {
        $asciiChars = [];

        for ($i = 0; $i <= 127; $i++) {
            $asciiChars[] = chr($i);
        }

        return $asciiChars;
    }

    protected function generateCombinationsRecursive(&$combinations, $characters, string $currentCombination, $length): void
    {
        if ($length === 0) {
            $combinations[] = $currentCombination;

            return;
        }

        foreach ($characters as $char) {
            $this->generateCombinationsRecursive($combinations, $characters, $currentCombination.$char, $length - 1);
        }
    }
}
