<?php

namespace App\Model;

class EntryModel
{
    public $items = array();
    private $count = 0;

    public function __construct()
    {
    }

    public function add($value)
    {
        $this->items[$this->count++] = $value;
    }
}
