<?php

use PHPUnit\Framework\TestCase;
use App\Service\Mail\SendMail;
use PHPMailer\PHPMailer\PHPMailer;

class MailTest extends TestCase
{

    public function startClass()
    {
        $this->mail = new SendMail();
        $this->phpMailer = new PHPMailer();
    }

    public function invokes(&$object, String $methodName, Array $ParametersMethod = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);
 
        return $method->invokeArgs($object, $ParametersMethod);
    }

    public function testConfigServer()
    {
        $this->startClass();

        $params = ['test@send.com.br', 'userTest', 'passTest', 'tls', '587'];

        $setConfigServer = $this->invokes($this->mail, 'setConfigServer', $params);

        $this->assertEquals(
            [
                $setConfigServer->Host,
                $setConfigServer->Username,
                $setConfigServer->Password,
                $setConfigServer->SMTPSecure,
                $setConfigServer->Port
            ],
            $params
        );
    }

    public function testSender()
    {
        $this->startClass();

        $params = [$this->phpMailer, 'test@send.com.br', 'userTest@send.com.br'];

        $setSender = $this->invokes($this->mail, 'setSender', $params);

        $this->assertEquals(
            [
                $setSender->Sender,
                $setSender->getToAddresses()[0][0]
            ],
            ['test@send.com.br', 'userTest@send.com.br']
        );
    }

    public function testWriteMessage()
    {
        $body = '<html><body><h1>Formulario Aprende Brasil On</h1><p style="font-size:15px;">nome_escola:  teste_nome_escola</p><p style="font-size:15px;">cidade:  teste_cidade</p><p style="font-size:18px;">Favor não responder este email</p><br></body></html>';

        $this->startClass();

        $params = [
            $this->phpMailer, 
            ['nome_escola' => 'teste_nome_escola','cidade' => 'teste_cidade'], 
            [],
            'Testando com o phpUnit'
        ];

        $writeMessage = $this->invokes($this->mail, 'writeMessage', $params);

        $this->assertEquals($writeMessage->Body, $body);
    }
}