<?php

namespace Spekulatius\PHPCharCombinator;

final class CustomCombinatorExample extends Combinator
{
    /**
     * Load a custom list
     *
     * @return string[]
     */
    public function prepareAsciiChars(): array
    {
        /**
         * Here you could simply return your array or load from a file:
         *
         * return explode("\n", file_get_contents('./list'));
         */
        return [
            'a',
            'b',
            'c',
        ];
    }
}
