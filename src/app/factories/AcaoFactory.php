<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Acao;
use MaquinaDeTuring\domain\Simbolo;

class AcaoFactory
{
    public static function criar(array $acao)
    {
        return new Acao(EstadoFactory::criar($acao['proximoEstado']), new Simbolo($acao['escrever']), $acao['direcao']);
    }
}
