<?php

namespace MaquinaDeTuring;

class Simbolo
{
    private $valor;

    public function __construct($simbolo)
    {
        $this->valor = $simbolo;
    }

    public function valor()
    {
        return $this->valor;
    }
}
