<?php

namespace App\Service\Request;

use GuzzleHttp\Client;

class RequestService // implements IRequest
{
    private $url;
    private $parameter;
    private $typeRequest;

    private $error;
    public $statusCode;

    public $data;

    public function __construct(String $typeRequest, string $url, String $parameter)
    {
        $this->url = $url;
        $this->parameter = $parameter;
        $this->typeRequest = $typeRequest;
    }

    public function getRequest()
    {
        try {
            $client = new Client();
            $response = $client->request(
                $this->typeRequest,
                $this->mountUrl()
            );
            $this->statusCode = 200;
            $this->data = json_decode($response->getBody(), true);
        } catch (\Exceptions $e) {
            $this->statusCode = 400;
            $this->error = $e->getMessage();
        }
    }
    
    public function isValid():Bool
    {
    }

    private function mountUrl():string
    {
        return $this->url.$this->parameter;
    }
}
