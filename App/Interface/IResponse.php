<?php

namespace App\Interfaces;

interface IResponse
{

    public function data();

    public function code():int;
}
