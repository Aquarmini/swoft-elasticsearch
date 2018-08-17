<?php

namespace Swoftx\Elasticsearch;

use Elasticsearch\ClientBuilder as ElasticsearchClientBuilder;
use Elasticsearch\Transport;
use Swoft\App;

class ClientBuilder extends ElasticsearchClientBuilder
{
    /**
     * @param Transport $transport
     * @param callable  $endpoint
     * @param Object[]  $registeredNamespaces
     * @return Client
     */
    protected function instantiate(Transport $transport, callable $endpoint, array $registeredNamespaces)
    {
        return new Client($transport, $endpoint, $registeredNamespaces);
    }
}