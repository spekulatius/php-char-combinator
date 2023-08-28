# PHP Char Combinator

The **PHP Char Combinator** is a utility class that provides methods to generate arrays of character combinations based on specified criteria.

**WARNING:**

- **This package is not intended to be deployed in any web-projects. It's a tool for testing - not production. No warrenty for any damage!**
- **This will generate a lot of combinations, make sure your are ready to handle the volume. You probably will need to adjust your `php.ini`**

## Features

- Generate arrays of character combinations within a specified length range.
- Generate an array of ASCII characters or non-alphanumeric ASCII characters.
- Recursive combination generation algorithm for generating all possible combinations.

## Usage

### Installation

```bash
composer require spekulatius/php-char-combinator
```

### Basic Usage

Here's a basic example of how you can use the `Combinator` class to generate combinations of characters:

```php
use Spekulatius\PHPCharCombinator\Combinator;

$combinator = new Combinator();

// Generate combinations of lengths 1 to 3 using ASCII characters
$asciiChars = $combinator->prepareAsciiChars();
$combinations = $combinator->generateCombinations($asciiChars, 1, 3);

foreach ($combinations as $combination) {
    echo $combination . "\n";
}
```

### Additional Methods

The `Combinator` class provides two additional methods:

#### `prepareAsciiChars()`

This method generates an array of all ASCII characters.

```php
$asciiChars = $combinator->prepareAsciiChars();
```

#### `prepareNonAlphanumericAsciiChars()`

This method generates an array of non-alphanumeric ASCII characters.

```php
$nonAlphanumericChars = $combinator->prepareNonAlphanumericAsciiChars();
```

## Contributing

Feel free to contribute by opening issues or pull requests on [GitHub](https://github.com/spekulatius/php-char-combinator).

## License

This project is open-source and available under the [MIT License](LICENSE.md).
