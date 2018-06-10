<?php

namespace MaquinaDeTuring\domain;

class Acao
{
    private $direcao;
    private $estado;
    private $simbolo;

    public function __construct(Estado $estado, Simbolo $simbolo, int $direcao)
    {
        $this->direcao = $direcao;
        $this->estado = $estado;
        $this->simbolo = $simbolo;
    }

    public function direcao(): int
    {
        return $this->direcao;
    }

    public function simbolo(): Simbolo
    {
        return $this->simbolo;
    }

    public function proximoEstado(): Estado
    {
        return $this->estado;
    }
}
