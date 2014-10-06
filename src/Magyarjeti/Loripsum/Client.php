<?php

namespace Magyarjeti\Loripsum;

class Client
{
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

    public function html($paragraphs)
    {
        $this->paragraphs = $paragraphs;

        unset($this->params['plaintext']);

        return $this;
    }

    public function plaintext($paragraphs)
    {
        $this->params['plaintext'] = true;

        $this->paragraphs = $paragraphs;

        return $this;
    }

    public function get()
    {
        $params = array_keys($this->params);

        if ($this->paragraphs) {
            $params[] = $this->paragraphs;
        }

        $url = sprintf(
            'http://loripsum.net/api/%s',
            implode('/', $params)
        );

        $this->params = [];
        $this->paragraphs = null;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $lipsum = curl_exec($ch);

        curl_close($ch);

        return $lipsum;
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
