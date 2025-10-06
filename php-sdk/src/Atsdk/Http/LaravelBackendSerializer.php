<?php

namespace ATSDK\Http;

use GuzzleHttp\Client;
use ATSDK\Http\HttpException;

class LaravelBackendSerializer implements SerializerInterface
{
    protected $baseUrl;
    protected $apiToken;
    protected $httpClient;

    public function __construct($baseUrl, $apiToken = null)
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiToken = $apiToken;
        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
        ]);
    }

    public function serialize($data, $contentType)
    {
        return json_encode($data);
    }

    public function deserialize($data, $contentType)
    {
        return json_decode($data, true);
    }

    /**
     * Main method to handle XML-RPC style requests to Laravel backend
     */
    public function request($method, $url, $params, $httpClient)
    {
        // Map XML-RPC method to Laravel endpoint
        list($httpMethod, $endpoint, $requestData) = $this->mapMethodToLaravelRoute($method, $params);

        // Build request options
        $options = [
            'headers' => [
                'Accept' => 'application/xml',
                'Content-Type' => 'application/xml',
                'X-Request-Type' => 'xmlrpc', // Flag for Laravel to know this is XML-RPC style
            ]
        ];

        if ($this->apiToken) {
            $options['headers']['Authorization'] = 'Bearer ' . $this->apiToken;
        }

        // Add data based on HTTP method
        if ($httpMethod === 'GET' || $httpMethod === 'DELETE') {
            if (!empty($requestData)) {
                $options['query'] = $requestData;
            }
        } else {
            $options['json'] = $requestData;
        }

        try {
            $response = $this->httpClient->request($httpMethod, $endpoint, $options);
            $body = $response->getBody()->getContents();
            $result = json_decode($body, true);

            // Return data in same format as Keap XML-RPC would return
            return isset($result['data']) ? $result['data'] : $result;
        } catch (\Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Map XML-RPC style method calls to Laravel routes
     */
    protected function mapMethodToLaravelRoute($method, $params)
    {
        // Parse "ContactService.add" into ["ContactService", "add"]
        list($service, $action) = explode('.', $method);
        $service = strtolower(str_replace('Service', '', $service));
        $action = strtolower($action);

        // Map to Laravel routes - all go through /api/xmlrpc endpoint
        $routes = [
            // Contact Service
            'ContactService.add' => ['POST', '/api/xmlrpc/contacts/add', ['data' => $params[0] ?? []]],
            'ContactService.update' => ['PUT', '/api/xmlrpc/contacts/update' . ($params[0] ?? 0), $params[1] ?? []],

            // Data Service
            'DataService.add' => ['POST', '/api/xmlrpc/data/create', ['data' => $params[0] ?? []]],
            'DataService.query' => ['POST', '/api/xmlrpc/data/query', ['data' => $params[0] ?? []]],
            'DataService.count' => ['POST', '/api/xmlrpc/data/count', ['data' => $params[0] ?? []]],

            // Invoice Service
            'InvoiceService.createBlankOrder' => ['POST', '/api/xmlrpc/invoice/blank-orders', ['data' => $params[0] ?? []]],
            'InvoiceService.addOrderItem' => ['POST', '/api/xmlrpc/invoice/order-items', ['data' => $params[0] ?? []]],
            'InvoiceService.addManualPayment' => ['POST', '/api/xmlrpc/invoice/manual-payments', ['data' => $params[0] ?? []]],
        ];

        $key = $service . '.' . $action;

        if (!isset($routes[$key])) {
            throw new \Exception("Method {$method} not mapped to Laravel route");
        }

        return $routes[$key];
    }
}