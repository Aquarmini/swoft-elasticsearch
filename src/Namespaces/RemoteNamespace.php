<?php


namespace Swoftx\Elasticsearch\Namespaces;


class RemoteNamespace extends \Elasticsearch\Namespaces\RemoteNamespace
{
    use PerformRequest;
}