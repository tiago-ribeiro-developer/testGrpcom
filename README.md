# testGrpcom

teste para grpcm

#### resumo:
Homepage desenvovida utilizando o MVC básico para retornar lista de programação e informar ao usuário o status da programação, pelo dia atual ou pela busca por data.

#### Tecnologias Utilizadas:

1. PHP(phpunit, php_codesniffer, swagger-php, simple-router, twig, e guzzle)
2. Python(Selenium)
3. docker
4. Selenium

#### links e documentações

1. https://phpunit.de/
2. https://github.com/squizlabs/PHP_CodeSniffer
3. https://www.php.net/manual/pt_BR/index.php
4. https://github.com/skipperbent/simple-php-router
5. https://twig.symfony.com/
6. https://www.docker.com/get-started
7. https://selenium-python.readthedocs.io/

#### Rodando o projeto no docker(nginx):

1. baixe o projeto
2. tenha o docker instalado na sua maquina local ([Docker para Windows](https://docs.docker.com/docker-for-windows/install/))
4. abra um terminal e navegue ate a pasta do projeto
5. rode o comando ``` docker-compose up -d ``` (ira rodar os containers e libera o terminal)
6. abra o KITEMATIC e vá ate o container _webserver_, e clique em WEB PREVIEW
7. no meu caso direciona para a url http://localhost:9000/
8. se deu tudo certo o projeto deve abrir

#### Rodando o teste automatizado (SOMENTE COM O DOCKER):

1. entre dentro do diretorio _Test/TestAutomated/_
2. rode o comando ``` docker-compose up ``` (ira rodar os contaieners) ou ``` docker-compose down && docker-compose up ``` (recontroi o container)
3. no terminal sera exibido a execução do teste
4. nos diretorios _test/testAutomated/Firefox_ sera exibido um screenshots de cada operação realizada

#### Rodando o teste unitário:

1. tenha acesso ao terminal
2. rode o comando ``` vendor/bin/phpunit ```

#### Rodando o codeSniffer(Padrão de código):

1. tenha acesso ao terminal
2. rode o comando ``` vendor/bin/phpcs ```
3. caso tenha um retorno de erros, rode o comando ``` vendor/bin/phpcbf ``` e rode o comando acima novamente
4. se ainda sim continuar os error ajuste manualmente

#### Rodando o projeto no Server PHP:

1. tenha o php instalado
2. rode o comando ``` php -S localhost:9000 ```
3. acesse http://localhost:9000/

#### Obs:

1. versão do php 7.2
2. Diposivel em https://testgrpcom.herokuapp.com/