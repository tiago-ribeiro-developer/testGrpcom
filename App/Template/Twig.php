<?php

namespace App\Template;

/**
 * Classe responsavel pela configuração do Twig
 */
class Twig
{
    /**
     * starta as consfugurações do twig
     *
     * @return void
     */
    public static function start()
    {
        $loader = new \Twig\Loader\FilesystemLoader("./App/View/");
        $twig = new \Twig\Environment($loader);

        $twig->addFilter(new \Twig\TwigFilter('cast_to_array', function ($stdClassObject) {
            $response = array();
            foreach ($stdClassObject as $key => $value) {
                $response[] = array($key, $value);
            }
            return $response;
        }));

        return $twig;
    }
}
