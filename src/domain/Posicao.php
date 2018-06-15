<?php

namespace MaquinaDeTuring\domain;

class Posicao
{
    private $estado;
    private $simbolo;

    public function __construct($posicao)
    {
        $posicao = explode(',', $posicao);
        $this->estado = new Estado($posicao[0]);
        $this->simbolo = new Simbolo($posicao[1]);
    }

    public function estado(): Estado
    {
        return $this->estado;
    }

    public function simbolo(): Simbolo
    {
        return $this->simbolo;
    }
}
