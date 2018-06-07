<?php

namespace MaquinaDeTuring;

class Simbolos
{
    private $simbolos;

    public function __construct($simbolos)
    {
        $this->simbolos = explode(',', $simbolos);
    }

    public function posicao(Simbolo $simbolo)
    {
        return $this->simbolos[$simbolo->valor()];
    }
}
