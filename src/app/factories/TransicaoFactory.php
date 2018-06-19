<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Acao;
use MaquinaDeTuring\domain\Posicao;
use MaquinaDeTuring\domain\Transicao;

class TransicaoFactory
{
    public static function criar($transicoes)
    {
        return array_map(function ($transicao){
            $transicao = explode('=', $transicao);
            return new Transicao(
                new Acao($transicao[1]),
                new Posicao($transicao[0])
            );
        }, $transicoes);
    }
}
