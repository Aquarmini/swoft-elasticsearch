<?php
namespace SwoftTest\Testing;

class Constants
{
    const INDEX = 'swoft:es:index';
    const TYPE = 'test';

    const MAPPING = [
        'index' => self::INDEX,
        'type' => self::TYPE,
        'body' => [
            'properties' => [
                'id' => ['type' => 'long'],
                'name' => ['type' => 'string'],
                'book' => [
                    'type' => 'object',
                    'properties' => [
                        'author' => ['type' => 'string'],
                        'name' => ['type' => 'string'],
                        'publish' => ['type' => 'date'],
                        'desc' => [
                            'type' => 'string',
                        ],
                    ],
                ],
                'age' => ['type' => 'short'],
                'birthday' => ['type' => 'date'],
                'location' => ['type' => 'geo_point'],
                'randnum' => ['type' => 'long'],
            ],
        ],
    ];
}
