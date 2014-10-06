<?php

require __DIR__ . '/vendor/autoload.php';

$lipsum = new Magyarjeti\Loripsum\Client;

echo $lipsum->html(2)->plaintext(3)->link()->get();
