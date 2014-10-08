Lorem ipsum generator
=====================

Lorem ipsum generator based on the loripsum.net API.

## Installation

### Requirements

- PHP 5.3+
- cURL extension

### With Composer

Create the following ```composer.json``` file and run the ```php composer.phar install``` command to install it.

```
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
$client->html(5)->headers()->link()->ul()->get();
```

Generate three short plain text paragraph:

```php
$client->text(3)->short()->get();
```

## Author

Magyar Jeti Zrt.

## License

Loripsum client is licensed under the MIT License - see the ```LICENSE``` file for details!
