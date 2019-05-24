# swoft-elasticsearch

[![Build Status](https://travis-ci.org/limingxinleo/swoft-elasticsearch.svg?branch=master)](https://travis-ci.org/limingxinleo/swoft-elasticsearch)

## 安装
~~~
composer require limingxinleo/swoft-elasticsearch
~~~

## 使用

使用方法与官方ES客户端一致

~~~php
<?php

use Elasticsearch\ClientBuilder;
use Swoftx\Elasticsearch\CoroutineHandler;

$handler = new CoroutineHandler([
    'timeout' => 2
]);
            
$client = ClientBuilder::create()
    ->setHosts(['127.0.0.1:9200'])
    ->setHandler($handler)
    ->build();

go(function() use ($client){
    print_r($client->info());
});
~~~