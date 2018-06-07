<?php

namespace MaquinaDeTuring;


class TabelaDeAcoes
{
    private $acoes = [];
    private $estados = [];
    private $simbolos = [];
    private $estadoAtual;

    public function __construct(Estado $estadoInicial, Estados $estados, Simbolos $simbolos)
    {
        $this->estados = $estados;
        $this->simbolos = $simbolos;
        $this->estadoAtual = $estadoInicial;
    }

    public function adicionarAcao(Acao $acao)
    {
        $this->acoes[$this->simbolos->posicao($acao->novoSimbolo())][$this->estados->posicao($acao->proximoEstado())] = $acao;
        return $this;
    }

    public function imprimir()
    {
        print_r($this->estados);
        print_r($this->simbolos);
    }
}
