<?php

namespace MaquinaDeTuring\domain;

class Acao
{
    private $direcao;
    private $estado;
    private $simbolo;

    public function __construct($acao)
    {
        $acao = explode(',', $acao);
        $this->estado = $acao[0];
        $this->simbolo = $acao[1];
        $this->direcao = $acao[2];
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
