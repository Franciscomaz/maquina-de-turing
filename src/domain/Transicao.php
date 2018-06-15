<?php

namespace MaquinaDeTuring\domain;


class Transicao
{
    private $acao;
    private $posicao;

    public function __construct(Acao $acao, Posicao $posicao)
    {
        $this->acao = $acao;
        $this->posicao = $posicao;
    }

    public function acao(): Acao
    {
        return $this->acao;
    }

    public function estado(): Estado
    {
        return $this->posicao->estado();
    }

    public function simbolo(): Simbolo
    {
        return $this->posicao->simbolo();
    }
}
