<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoftx\Elasticsearch;

use Elasticsearch\ClientBuilder as ElasticsearchClientBuilder;
use Elasticsearch\Transport;

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
