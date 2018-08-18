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

use SwoftTest\Testing\Constants;

class ElasticsearchTest extends AbstractTestCase
{
    public function testInfo()
    {
        $expect = $this->client->info();
        go(function () use ($expect) {
            $actual = $this->client->info();
            $this->assertEquals($expect, $actual);
        });
    }
}
