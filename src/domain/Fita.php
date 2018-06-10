<?php

namespace MaquinaDeTuring;

use MaquinaDeTuring\app\utils\Log;

class Fita implements Log
{
    private $log = [];
    private $posicao;
    private $celulas;

    public function __construct(array $celulas)
    {
        $this->posicao = 0;
        $this->celulas = $celulas;
    }

    public function mover(int $direcao)
    {
        $temp = $this->posicao + $direcao;
        if($temp < 0){
            array_unshift($this->celulas, Simbolo::criarVazio());
            return;
        }
        if($temp >= count($this->celulas)){
            array_push($this->celulas, Simbolo::criarVazio());
        }
        $this->posicao = $temp;
    }

    public function escrever(Simbolo $simbolo)
    {
        $this->log[] = [
            'posicao' => $this->posicao,
            'simbolo' => $simbolo->nome()
        ];
        $this->celulas[$this->posicao] = $simbolo;
    }

    public function simboloAtual()
    {
        return $this->celulas[$this->posicao];
    }

    public function getLog()
    {
        return $this->log;
    }
}
