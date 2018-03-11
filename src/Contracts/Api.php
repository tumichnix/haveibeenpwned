<?php

namespace Tumichnix\HaveIBeenPwned\Contracts;

use GuzzleHttp\Client as GuzzleClient;
use Tumichnix\HaveIBeenPwned\Response;

abstract class Api
{
    protected $config = [
        'base_uri' => 'https://haveibeenpwned.com/api/v2/',
    ];

    protected function request($method, $endpoint, array $options = [])
    {
        $client = new GuzzleClient($this->config);
        $response = $client->request($method, trim($endpoint, '/'), $options);

        return new Response($response);
    }

    protected function get($endpoint, array $options = [])
    {
        return $this->request('get', $endpoint, $options);
    }
}
