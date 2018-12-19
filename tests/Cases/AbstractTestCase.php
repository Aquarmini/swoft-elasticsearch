<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace SwoftTest\Cases;

use Elasticsearch\Client;
use Guzzlex\SwooleHandlers\RingPHP\CoroutineHandler;
use PHPUnit\Framework\TestCase;
use Swoftx\Elasticsearch\ClientBuilder;
use Swoole\Coroutine;

/**
 * Class AbstractTestCase
 *
 * @package SwoftTest\Db\Cases
 */
abstract class AbstractTestCase extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
    }

    public function getClient(): Client
    {
        $builder = ClientBuilder::create()->setHosts(['127.0.0.1:9200']);
        if (extension_loaded('swoole') && Coroutine::getuid() > 0) {
            $handler = new CoroutineHandler();
            $handler->setSettings([
                'timeout' => 2
            ]);

            $builder->setHandler($handler);
        }
        return $builder->build();
    }

    protected function tearDown()
    {
        parent::tearDown();
        swoole_timer_after(6 * 1000, function () {
            swoole_event_exit();
        });
    }
}
