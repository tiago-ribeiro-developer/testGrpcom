<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;

/**
 *
 * @param string|null $name
 * @param [type] $parameters
 * @param array|null $getParams
 * @return Url
 */
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 *
 * @return Response
 */
function response(): Response
{
    return Router::response();
}

/**
 *
 * @return Request
 */
function request(): Request
{
    return Router::request();
}

/**
 *
 * @param [type] $index
 * @param [type] $defaultValue
 * @param [type] ...$methods
 * @return void
 */
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->getValue($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 *
 * @param string $url
 * @param integer|null $code
 * @return void
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}

/**
 *
 * @return string|null
 */
function csrf_token(): ?string
{
    $baseVerifier = Router::router()->getCsrfVerifier();
    if ($baseVerifier !== null) {
        return $baseVerifier->getTokenProvider()->getToken();
    }

    return null;
}
