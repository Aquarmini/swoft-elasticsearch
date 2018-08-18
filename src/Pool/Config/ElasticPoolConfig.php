<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
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
     * @Value(env="${ELASTICSEARCH_CLIENT_TIMEOUT}")
     * @var float
     */
    protected $timeout = 2;
}
