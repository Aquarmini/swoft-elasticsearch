<?php
namespace SwoftTest\Cases;

use SwoftTest\Testing\Constants;

class IndicesTest extends AbstractTestCase
{
    public function testIndicesExist()
    {
        $indexes = $this->client->indices();
        $expect = $indexes->exists(['index' => Constants::INDEX]);
        go(function () use ($expect) {
            $indexes = $this->client->indices();
            $actual = $indexes->exists(['index' => Constants::INDEX]);
            $this->assertEquals($expect, $actual);
        });
    }

    public function testIndicesInfo()
    {
        $indexes = $this->client->indices();
        $expect = $indexes->get(['index' => Constants::INDEX]);
        go(function () use ($expect) {
            $indexes = $this->client->indices();
            $actual = $indexes->get(['index' => Constants::INDEX]);
            $this->assertEquals($expect, $actual);
        });
    }
}