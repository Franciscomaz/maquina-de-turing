<?php

namespace MaquinaDeTuring;

class Estados
{
    private $estados;

    public function __construct($estados)
    {
        $this->estados = explode(',', $estados);
    }

    public function posicao(Estado $estado)
    {
        return $this->estados[$estado->valor()];
    }
}
