<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
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
                'name' => ['type' => 'text'],
                'book' => [
                    'type' => 'object',
                    'properties' => [
                        'author' => ['type' => 'text'],
                        'name' => ['type' => 'text'],
                        'publish' => ['type' => 'date'],
                        'desc' => [
                            'type' => 'text',
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
