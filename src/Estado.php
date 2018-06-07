<?php

namespace MaquinaDeTuring;

class Estado
{
    private $valor;

    public function __construct($estado)
    {
        $this->valor = $estado;
    }

    public function valor()
    {
        return $this->valor;
    }
}
