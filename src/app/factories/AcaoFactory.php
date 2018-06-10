<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\Acao;

class AcaoFactory
{
    public static function criar(array $acao)
    {
        return new Acao(EstadoFactory::criar($acao['estado']), $acao['simbolo'], $acao['direcao']);
    }
}
