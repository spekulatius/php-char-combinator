<?php

namespace Spekulatius\PHPCharCombinator;

class Combinator
{
    /**
     * Creates an array of all possible combinations with a certain length range.
     *
     * @param  array<string>  $characters
     * @return array<string>
     */
    public function generateCombinations(array $characters, int $startLevels, int $endLevels): array
    {
        // Initialize an array to store the generated combinations
        $combinations = [];

        // Generate combinations for each length from $startLevels to $endLevels
        for ($length = $startLevels; $length <= $endLevels; $length++) {
            $this->generateCombinationsRecursive($combinations, $characters, '', $length);
        }

        // Return the generated combinations
        return $combinations;
    }

    /**
     * One possible provider of data for the list.
     *
     * @return string[]
     */
    public function prepareAsciiChars(): array
    {
        $asciiChars = [];

        for ($i = 0; $i <= 127; $i++) {
            $asciiChars[] = chr($i);
        }

        return $asciiChars;
    }

    /**
     * Simplified Ascii list without without alpha-numeric-only entries
     *
     * @return string[]
     */
    public function prepareNonAlphanumericAsciiChars(): array
    {
        $nonAlphanumericChars = [];

        for ($i = 0; $i <= 127; $i++) {
            $char = chr($i);
            if (! ctype_alnum($char)) {
                $nonAlphanumericChars[] = $char;
            }
        }

        return $nonAlphanumericChars;
    }

    /**
     * @param  array<string>  $combinations
     * @param  array<string>  $characters
     */
    protected function generateCombinationsRecursive(&$combinations, $characters, string $currentCombination, int $length): void
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
