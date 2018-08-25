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

class IndicesTest extends AbstractTestCase
{
    public function testIndicesExist()
    {
        $indexes = $this->getClient()->indices();
        $expect = $indexes->exists(['index' => Constants::INDEX]);
        go(function () use ($expect) {
            $indexes = $this->getClient()->indices();
            $actual = $indexes->exists(['index' => Constants::INDEX]);
            $this->assertEquals($expect, $actual);
        });
    }

    public function testIndicesInfo()
    {
        $indexes = $this->getClient()->indices();
        $expect = $indexes->get(['index' => Constants::INDEX]);
        go(function () use ($expect) {
            $indexes = $this->getClient()->indices();
            $actual = $indexes->get(['index' => Constants::INDEX]);
            $this->assertEquals($expect, $actual);
        });
    }
}
