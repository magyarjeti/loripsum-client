<?php

use Magyarjeti\Loripsum\Client;
use Magyarjeti\Loripsum\Http\CurlAdapter;

require __DIR__ . '/vendor/autoload.php';

$client = new Client(new CurlAdapter);

echo $client->html(2)->plaintext(3)->link()->get();
