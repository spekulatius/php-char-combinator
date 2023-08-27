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

    private function generateAsciiChars()
    {
        $asciiChars = [];

        for ($i = 0; $i <= 127; $i++) {
            $asciiChars[] = chr($i);
        }

        return $asciiChars;
    }

    private function generateCombinationsRecursive(&$combinations, $characters, $currentCombination, $length)
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