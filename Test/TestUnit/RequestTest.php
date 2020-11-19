<?php

use PHPUnit\Framework\TestCase;
use App\Service\Request\RequestService;

class RequestTest extends TestCase
{

    public function startClass()
    {
        $this->requestService = new RequestService("GET", "https://epg-api.video.globo.com/programmes/1337", "");
    }

    public function invokes(&$object, String $methodName, Array $ParametersMethod = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
 
        return $method->invokeArgs($object, $ParametersMethod);
    }

    public function testRequestSuccess()
    {
        $this->startClass();
        $this->requestService->getRequest();

        $this->assertEquals($this->requestService->statusCode, 200);
    }
}