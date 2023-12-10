<?php

namespace App\Components;

use GuzzleHttp\Client;

class DataClientGazzle
{
  public $client;

    /**
     * @param $client
     */
    public function __construct($client)
    {
        $this->client = $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'http://httpbin.org',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
    }
}
