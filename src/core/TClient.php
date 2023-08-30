<?php

namespace SearchEngine\core;

use Manticoresearch\Client;
use Manticoresearch\Nodes;

trait TClient {
    protected string $host;
    protected int    $port;
    public function client(): Client
    {
        $config = ['host' => $this->host, 'port' => $this->port];
        return new Client($config);
    }

    public function host(string $host): static
    {
        $this->host = $host;
        return $this;
    }

    public function port(int $port): static
    {
        $this->port = $port;
        return $this;
    }

    public function nodes(): Nodes
    {
        $client = $this->client();
        return $client->nodes();
    }

    public function tables()
    {
        $client = $this->client();
        return $client->nodes()->tables();
    }
}