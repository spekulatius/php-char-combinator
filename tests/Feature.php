<?php

use Spekulatius\PHPCharCombinator\Combinator;

it('generates combinations of lengths 1 to 3', function () {
    $combinator = new Combinator();
    $combinations = $combinator->generateCombinations(
        $combinator->prepareAsciiChars(),
        1,
        3
    );

    expect($combinations)->toBeArray();
    expect(count($combinations))->toBeGreaterThan(0);
    expect(in_array('a', $combinations))->toBeTrue(); // Check for specific combinations
    expect(in_array('abc', $combinations))->toBeTrue();

    foreach ($combinations as $combination) {
        $length = strlen($combination);
        expect($length)->toBeGreaterThanOrEqual(1);
        expect($length)->toBeLessThanOrEqual(3);
    }
});

it('generates combinations of lengths 4 and 5', function () {
    $combinator = new Combinator();
    $combinations = $combinator->generateCombinations(
        $combinator->prepareAsciiChars(),
        4,
        5
    );

    expect($combinations)->toBeArray();
    expect(count($combinations))->toBeGreaterThan(0);
    expect(in_array('abcd', $combinations))->toBeTrue(); // Check for specific combinations
    expect(in_array('abcde', $combinations))->toBeTrue();

    foreach ($combinations as $combination) {
        $length = strlen($combination);
        expect($length)->toBeGreaterThanOrEqual(4);
        expect($length)->toBeLessThanOrEqual(5);
    }
});

it('generates empty combinations when startLevels is greater than endLevels', function () {
    $combinator = new Combinator();
    $combinations = $combinator->generateCombinations(
        $combinator->prepareAsciiChars(),
        3,
        2
    );

    expect($combinations)->toBeArray();
    expect($combinations)->toBeEmpty();
});
