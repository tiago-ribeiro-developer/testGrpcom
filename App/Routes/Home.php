<?php

use App\Routes\Router;
use App\Template\Twig;
use App\Service\Request\RequestService;
use App\Repository\ApiRepository;

/**
 * @OA\Info(title="Rotas para projeto de teste da grpcom", version="0.1")
 * @OA\Server(
 *     description="localhost",
 *     url="http://localhost:9000/"
 * )
 */
Router::get('/', function () {
    try {

        $params = input()->all();

        $parameterDate = "";

        if( (isset($params["date"])) && ($params["date"] != ""))
        {
            $parameterDate = "?date=".$params["date"];
        }

        $request = new RequestService("GET", "https://epg-api.video.globo.com/programmes/1337", $parameterDate);
        $apiModel = new ApiRepository($request);
        $entryModel = $apiModel->getEntryModel();

        echo (new Twig)->start()->render('index.html', ['programs' => $entryModel->items]);
    } catch (\Exception $e) {
        echo (new Twig)->start()->render('index.html', ['error' => 'não foi possivel se conectar com a api']);
    }
});

Router::error(function () {
    echo (new Twig)->start()->render('notFound.html');
});