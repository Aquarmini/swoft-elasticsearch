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
use GuzzleHttp\Ring\Client\CurlHandler;
use GuzzleHttp\Ring\Client\CurlMultiHandler;
use GuzzleHttp\Ring\Client\Middleware;
use Guzzlex\SwooleHandlers\RingPHP\CoroutineHandler;
use Swoole\Coroutine;

class ClientBuilder extends ElasticsearchClientBuilder
{
    /**
     * @param array $multiParams
     * @param array $singleParams
     * @throws \RuntimeException
     * @return callable
     */
    public static function defaultHandler($multiParams = [], $singleParams = [])
    {
        $future = null;
        if (extension_loaded('swoole') && Coroutine::getuid() > 0) {
            $default = new CoroutineHandler();
        } elseif (extension_loaded('curl')) {
            $config = array_merge(['mh' => curl_multi_init()], $multiParams);
            if (function_exists('curl_reset')) {
                $default = new CurlHandler($singleParams);
                $future = new CurlMultiHandler($config);
            } else {
                $default = new CurlMultiHandler($config);
            }
        } else {
            throw new \RuntimeException('Elasticsearch-PHP requires cURL, or a custom HTTP handler.');
        }

        return $future ? Middleware::wrapFuture($default, $future) : $default;
    }
}
