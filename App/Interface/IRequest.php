<?php

namespace App\Interfaces;

interface IRequest
{

    public function request();

    public function isValid():Bool;
}
