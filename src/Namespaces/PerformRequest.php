<?php
namespace Swoftx\Elasticsearch\Namespaces;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Swoft\App;
use Swoft\Helper\JsonHelper;
use Swoft\HttpClient\Client as HttpClient;

trait PerformRequest
{
    /**
     * @param $endpoint AbstractEndpoint
     *
     * @throws \Exception
     * @return array
     */
    protected function performRequest(AbstractEndpoint $endpoint)
    {
        if (App::isCoContext()) {
            $connection = $this->transport->getConnection();
            $uri = $endpoint->getURI();
            if ($params = $endpoint->getParams()) {
                $uri .= '?' . http_build_query($params);
            }
            $client = new HttpClient([
                'base_uri' => $connection->getHost()
            ]);

            $string = $client->request($endpoint->getMethod(), $uri, [
                'json' => $endpoint->getBody()
            ])->getResult();

            return JsonHelper::decode($string, true);
        }

        return parent::performRequest($endpoint);
    }
}