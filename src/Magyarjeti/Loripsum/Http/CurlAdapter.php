<?php

namespace Magyarjeti\Loripsum\Http;

/**
 * Curl based HTTP adapter.
 */
class CurlAdapter implements AdapterInterface
{
    /**
     * @var integer Connection timeout.
     */
    public $timeout = 5;

    /**
     * Make a HTTP request.
     *
     * @param string $url
     * @return string Response body.
     * @throws \RuntimeException
     */
    public function request($url)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);

        $response = curl_exec($ch);

        curl_close($ch);

        if ($response === false) {
            throw new \RuntimeException('Connection timeout.');
        }

        return $response;
    }
}
