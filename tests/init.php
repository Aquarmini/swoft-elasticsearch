<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
require_once 'bootstrap.php';

use Swoftx\Elasticsearch\ClientBuilder;
use SwoftTest\Testing\Constants;

$client = ClientBuilder::create()->setHosts(['127.0.0.1:9200'])->build();

// 删除已存在的索引
$indices = $client->indices();
$index = Constants::INDEX;
$type = Constants::TYPE;
$mapping = Constants::MAPPING;

$params = [
    'index' => $index,
];

if ($indices->exists($params)) {
    $res = $indices->delete($params);
    if ($res['acknowledged']) {
        echo "删除索引[{$index}]成功" . PHP_EOL;
    }
}

// 创建索引
try {
    $res = $indices->create($params);
    if ($res['acknowledged']) {
        echo "索引[{$index}]创建成功" . PHP_EOL;
    }
} catch (\Exception $ex) {
    $res = json_decode($ex->getMessage(), true);
    echo $res['error']['reason'] . PHP_EOL;
}

// 创建Mapping
$params = $mapping;
$res = $indices->putMapping($params);

if ($res['acknowledged']) {
    echo 'Mapping 设置成功' . PHP_EOL;
}

// 导入数据
$docs = require 'config/properties/es_docs.php';

foreach ($docs as $id => $doc) {
    $param = [
        'index' => $index,
        'type' => $type,
        'id' => $id,
        'body' => $doc
    ];

    $res = $client->index($param);
}
echo '测试文档导入成功' . PHP_EOL;
