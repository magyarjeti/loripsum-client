<?php

namespace Magyarjeti\Loripsum;

use Magyarjeti\Loripsum\Http\AdapterInterface;

/**
 * Client for loripsum.net.
 */
class Client
{
    /**
     * @const string API endpoint.
     */
    const API_URL = 'http://loripsum.net/api/';

    /**
     * @var array Text generation capabilities.
     */
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

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var integer Number of paragraphs to generate.
     */
    protected $paragraphs;

    /**
     * @var AdapterInterface HTTP adapter instance.
     */
    protected $conn;

    /**
     * Create new loripsum client.
     *
     * @param AdapterInterface $conn
     */
    public function __construct(AdapterInterface $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Ask for HTML sample.
     *
     * @param integer $paragraphs Number of paragraphs.
     * @return Client
     */
    public function html($paragraphs = null)
    {
        $this->paragraphs = $paragraphs;

        unset($this->params['plaintext']);

        return $this;
    }

    /**
     * Ask for plain text sample.
     *
     * @param integer $paragraphs Number of paragraphs.
     * @return Client
     */
    public function plaintext($paragraphs = null)
    {
        $this->paragraphs = $paragraphs;

        $this->params['plaintext'] = true;

        return $this;
    }

    /**
     * Generate the sample.
     *
     * @return string
     */
    public function get()
    {
        $params = array_keys($this->params);

        if ($this->paragraphs) {
            $params[] = $this->paragraphs;
        }

        $url = self::API_URL . implode('/', $params);

        return $this->conn->request($url);
    }

    /**
     * Set text generation parameters.
     *
     * @param string $method
     * @param array  $params
     * @return Client
     */
    public function __call($method, $params)
    {
        if (!in_array($method, $this->capabilities)) {
            throw new \RuntimeException("Unknown parameter: $method");
        }

        $this->params[$method] = true;

        return $this;
    }
}
