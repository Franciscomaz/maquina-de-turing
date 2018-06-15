<?php

namespace MaquinaDeTuring\domain;


use MaquinaDeTuring\app\utils\Log;

class TabelaDeAcoes implements Log
{
    private $log = [];
    private $acoes;
    private $estados;
    private $simbolos;
    private $estadoAtual;

    public function __construct(Estado $estadoInicial)
    {
        $this->acoes = [];
        $this->estados = [];
        $this->simbolos = [];
        $this->estadoAtual = $estadoInicial;
    }

    public function adicionarTransicao(Transicao $transicao): self
    {
        $x = $this->coordenadaX($transicao->simbolo());
        $y = $this->coordenadaY($transicao->estado());
        $this->acoes[$x][$y] = $transicao->acao();
        return $this;
    }

    public function proximaAcao(Estado $estado, Simbolo $simbolo): Acao
    {
        $this->log[] = [
            'x' => $this->coordenadaX($simbolo),
            'y' => $this->coordenadaY($estado)
        ];
        return $this->acoes[$this->coordenadaX($simbolo)][$this->coordenadaY($estado)];
    }

    private function coordenadaY(Estado $estado)
    {
        if(!isset($this->estados[$estado->nome()])){
            $this->estados[$estado->nome()] = count($this->estados);
        }
        return $this->estados[$estado->nome()];
    }

    private function coordenadaX(Simbolo $simbolo)
    {
        if(!isset($this->simbolos[$simbolo->nome()])){
            $this->simbolos[$simbolo->nome()] = count($this->simbolos);
        }
        return $this->simbolos[$simbolo->nome()];
    }

    public function getLog()
    {
        return $this->log;
    }
}
