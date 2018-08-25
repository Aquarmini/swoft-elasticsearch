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
use PHPUnit\Framework\TestCase;
use Swoftx\Elasticsearch\ClientBuilder;

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
        return ClientBuilder::create()->setHosts(['127.0.0.1:9200'])->build();
    }

    protected function tearDown()
    {
        parent::tearDown();
        swoole_timer_after(6 * 1000, function () {
            swoole_event_exit();
        });
    }
}
