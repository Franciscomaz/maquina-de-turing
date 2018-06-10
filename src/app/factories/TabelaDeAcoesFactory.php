<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\TabelaDeAcoes;

class TabelaDeAcoesFactory
{
    public static function criar($dados)
    {
        $tabela = new TabelaDeAcoes(EstadoFactory::criar($dados['estadoInicial']),
            $dados['estados'],
            $dados['simbolos']
        );
        foreach ($dados['acoes'] as $acao) {
            $tabela->adicionarAcao(AcaoFactory::criar($acao));
        }
        return $tabela;
    }

}