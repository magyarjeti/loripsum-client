<?php

namespace Magyarjeti\Loripsum\Http;

/**
 * Interface for HTTP adapters.
 */
interface AdapterInterface
{
    /**
     * Make a HTTP request.
     *
     * @param string $url
     * @return string Response body.
     */
    public function request($url);
}
