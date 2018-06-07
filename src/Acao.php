<?php

namespace MaquinaDeTuring;

class Acao
{
    private $direcao;
    private $estado;
    private $simbolo;

    public function __construct(Estado $estado, Simbolo $simbolo, $direcao)
    {
        $this->direcao = $direcao;
        $this->estado = $estado;
        $this->simbolo = $simbolo;
    }

    public function proximoEstado()
    {
        return $this->estado;
    }

    public function novoSimbolo()
    {
        return $this->simbolo;
    }

    public function direcao()
    {
        return $this->direcao;
    }
}
