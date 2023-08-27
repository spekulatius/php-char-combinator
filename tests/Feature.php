<?php

use Spekulatius\PHPCharCombinator\Combinator;

it('generates combinations of length 3', function () {
    $combinator = new Combinator();
    $combinations = $combinator->generateCombinations(
        $combinator->prepareAsciiChars(),
        3,
        3
    );

    expect($combinations)->toBeArray();
    expect(count($combinations))->toBeGreaterThan(0);
    expect(in_array('abc', $combinations))->toBeTrue();

    foreach ($combinations as $combination) {
        $length = strlen($combination);
        expect($length)->toBeGreaterThanOrEqual(3);
        expect($length)->toBeLessThanOrEqual(3);
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
