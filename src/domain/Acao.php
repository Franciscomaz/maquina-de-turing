<?php

namespace MaquinaDeTuring\domain;

use MaquinaDeTuring\app\factories\EstadoFactory;

class Acao
{
    private $direcao;
    private $estado;
    private $simbolo;

    public function __construct($acao)
    {
        $acao = explode(',', $acao);
        $this->estado = EstadoFactory::criar($acao[0]);
        $this->simbolo = new Simbolo($acao[1]);
        $this->direcao = $this->converterDirecaoParaInt($acao[2]);
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

    private function converterDirecaoParaInt($direcao)
    {
        if ($direcao == 'D'){
            return 1;
        } else {
            return -1;
        }
    }
}
