<?php
namespace SwoftTest\Cases;

use SwoftTest\Testing\Constants;

class DocumentTest extends AbstractTestCase
{
    public function testGetDocument()
    {
        $params = [
            'index' => Constants::INDEX,
            'type' => Constants::TYPE,
            'id' => 0,
        ];
        $expect = $this->client->get($params);
        go(function () use ($expect, $params) {
            $actual = $this->client->get($params);
            $this->assertEquals($expect, $actual);
        });
    }

    public function testAddDocument()
    {
        $this->client->delete([
            'index' => Constants::INDEX,
            'type' => Constants::TYPE,
            'id' => 999
        ]);

        $body = [
            'name' => 'Mr.999',
            'age' => 99,
            'birthday' => '1990-01-01',
            'book' => [
                'author' => 'limx',
                'name' => '长寿的秘诀',
                'publish' => '2018-01-01',
                'desc' => '多睡觉'
            ],
            'location' => [
                'lat' => 0,
                'lon' => 0,
            ],
            'randnum' => 999
        ];

        $params = [
            'index' => Constants::INDEX,
            'type' => Constants::TYPE,
            'id' => 999,
            'body' => $body,
        ];

        $expect = $this->client->index($params);
        $this->assertTrue($expect['created']);
        $this->assertEquals('created', $expect['result']);
        $version = $expect['_version'];

        go(function () use ($expect, $params, $version) {
            $actual = $this->client->index($params);

            $this->assertFalse($actual['created']);
            $this->assertEquals('updated', $actual['result']);
            $this->assertEquals($version + 1, $actual['_version']);
        });
    }
}