<?php

namespace Magyarjeti\Loripsum\Http;

class CurlAdapter implements AdapterInterface
{
    public $timeout = 5;

    public function request($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
