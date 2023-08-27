<?php

namespace Spekulatius\PHPCharCombinator;

class Combinator
{
    public function generateCombinations($startLevels, $endLevels)
    {
        $asciiChars = $this->generateAsciiChars();

        $combinations = [];
        for ($length = $startLevels; $length <= $endLevels; $length++) {
            $this->generateCombinationsRecursive($combinations, $asciiChars, '', $length);
        }

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
            $this->generateCombinationsRecursive($combinations, $characters, $currentCombination . $char, $length - 1);
        }
    }
}
