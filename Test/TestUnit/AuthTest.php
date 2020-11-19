<?php

use PHPUnit\Framework\TestCase;
use App\Service\Auth\Autentication;

class AuthTest extends TestCase
{

    private $paramRequest = [
        'username' => 'testemanual10',
        'password' => 'testemanual10',
        'client_id' => '3938BCFC-7018-E611-862E-91EEAE34E1F3',
        'grant_type' => 'password'
    ];

    private $token;


    public function startClass()
    {
        $this->auth = new Autentication();
    }

    public function invokes(&$object, String $methodName, Array $ParametersMethod = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
 
        return $method->invokeArgs($object, $ParametersMethod);
    }

    public function testRequest()
    {
        $this->startClass();

        /**
         * 
         */
        $this->auth->setUrl(getenv('URL_ACCOUNT_ON'))
            ->setFormData($this->paramRequest);

        $getRequest = $this->invokes($this->auth, 'getRequest', ["POST"]);
        $this->setToken($this->auth->getData()['access_token']);

        $this->assertEquals($this->auth->getRequestStatusCode(),200);

        /**
         * 
         */
        $url = $_ENV['URL_ACCOUNTV2_ON']."?userName=".$this->paramRequest['username']."&password=".$this->paramRequest['password']."&audienceClient=".$this->paramRequest['client_id']."&grant_type=".$this->paramRequest['grant_type'];

        $this->auth->setUrl($url);

        $getRequest = $this->invokes($this->auth, 'getRequest');

        $this->assertEquals($this->auth->getRequestStatusCode(),200);

        /**
         * 
         */
        $this->auth->setUrl($_ENV['URL_ROLES_ON']);
        $this->auth->setAccessToken($this->getToken());

        $getRequest = $this->invokes($this->auth, 'getRequest');

        $this->assertEquals($this->auth->getRequestStatusCode(),200);
    }

    public function testRequestFail()
    {
        $this->startClass();

        $this->expectException(GuzzleHttp\Exception\ClientException::class);

        $paramRequestFail = [
            'username' => 'usuarioInvalido',
            'password' => 'senhaInvallida',
            'client_id' => '3938BCFC-7018-E611-862E-91EEAE34E1F3',
            'grant_type' => 'password'
        ];

        $this->auth->setUrl(getenv('URL_ACCOUNT_ON'))
            ->setFormData($paramRequestFail);

        $getRequest = $this->invokes($this->auth, 'getRequest', ["POST"]);

    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }
}