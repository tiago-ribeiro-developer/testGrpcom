<?php

namespace App\Routes;

use Pecee\SimpleRouter\SimpleRouter;

/**
 * Class responsavel pelas rotas
 */
class Router extends SimpleRouter
{

    /**
     * retorna todas as rotas
     *
     * @return void
     */
    public static function start(): void
    {
        require_once 'App/Helper/Helpers.php';
        require_once 'Home.php';

        parent::start();
    }
}
