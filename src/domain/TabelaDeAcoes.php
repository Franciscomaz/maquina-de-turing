<?php

namespace MaquinaDeTuring;


use MaquinaDeTuring\app\utils\Log;

class TabelaDeAcoes implements Log
{
    private $log = [];
    private $acoes;
    private $estados;
    private $simbolos;
    private $estadoAtual;

    public function __construct(Estado $estadoInicial, array $estados, array $simbolos)
    {
        $this->acoes = [];
        $this->estados = $estados;
        $this->simbolos = $simbolos;
        $this->estadoAtual = $estadoInicial;
    }

    public function adicionarAcao(Acao $acao): self
    {
        $this->acoes[$this->coordenadaX($acao->simbolo())][$this->coordenadaY($acao->proximoEstado())] = $acao;
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
        return $this->estados[$estado->nome()];
    }

    private function coordenadaX(Simbolo $simbolo)
    {
        return $this->simbolos[$simbolo->nome()];
    }

    public function getLog()
    {
        return $this->log;
    }
}
