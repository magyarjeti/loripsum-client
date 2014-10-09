Lorem ipsum generator
=====================

[![Build Status](https://travis-ci.org/magyarjeti/loripsum-client.svg?branch=master)](https://travis-ci.org/magyarjeti/loripsum-client)

Lorem ipsum generator based on the [loripsum.net](http://loripsum.net/) API.

## Installation

### Requirements

- PHP 5.3+
- cURL extension

### With Composer

Create the following ```composer.json``` file and run the ```php composer.phar install``` command to install it.

```json
{
    "require": {
        "magyarjeti/loripsum-client": "*"
    }
}
```
```php
<?php

require 'vendor/autoload.php';

use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;

$client = new Client(new CurlAdapter);
```

## Usage

Generate five paragraph HTML text with headers, link and unordered list:

```php
$client->headers()->link()->ul()->html(5);
```

Generate three short plain text paragraph:

```php
$client->short()->text(3);
```

### Text formatting options

- **short, medium, long, verylong** - The average length of a paragraph.
- **decorate** - Add bold, italic and marked text.
- **link** - Add links.
- **ul** - Add unordered lists.
- **ol** - Add numbered lists.
- **dl** - Add description lists.
- **bq** - Add blockquotes.
- **code** - Add code samples.
- **headers** - Add headers.
- **allcaps** - Use ALL CAPS.
- **prude** - Prude version.

## Author

Magyar Jeti Zrt.

## License

Loripsum client is licensed under the MIT License - see the ```LICENSE``` file for details!
