<?php

namespace Magyarjeti\Loripsum;

use Magyarjeti\Loripsum\Http\CurlAdapter;

class Client
{
    const API_URL = 'http://loripsum.net/api/';

    protected $capabilities = [
        'short',
        'medium',
        'long',
        'verylong',
        'decorate',
        'link',
        'ul',
        'ol',
        'dl',
        'bq',
        'code',
        'headers',
        'allcaps',
        'prude'
    ];

    protected $params = [];

    protected $paragraphs;

    protected $conn;

    public function __construct(CurlAdapter $conn)
    {
        $this->conn = $conn;
    }

    public function html($paragraphs = null)
    {
        $this->paragraphs = $paragraphs;

        unset($this->params['plaintext']);

        return $this;
    }

    public function plaintext($paragraphs = null)
    {
        $this->paragraphs = $paragraphs;

        $this->params['plaintext'] = true;

        return $this;
    }

    public function get()
    {
        $params = array_keys($this->params);

        if ($this->paragraphs) {
            $params[] = $this->paragraphs;
        }

        $url = self::API_URL . implode('/', $params);

        return $this->conn->request($url);
    }

    public function __call($method, $params)
    {
        if (!in_array($method, $this->capabilities)) {
            throw new \RuntimeException("Unknown parameter: $method");
        }

        $this->params[$method] = true;

        return $this;
    }
}
