<?php
namespace Swoftx\Elasticsearch\Pool\Config;

use Swoft\Pool\PoolProperties;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * Class ElasticPoolConfig
 * @Bean
 * @package Swoftx\Elasticsearch\Pool\Config
 */
class ElasticPoolConfig extends PoolProperties
{
    /**
     * Connection timeout
     * @Value(env="{$ELASTICSEARCH_CLIENT_TIMEOUT}")
     * @var float
     */
    protected $timeout = 2;
}
