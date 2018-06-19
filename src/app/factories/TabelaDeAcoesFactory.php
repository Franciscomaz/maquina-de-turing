<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\TabelaDeAcoes;

class TabelaDeAcoesFactory
{
    public static function criar(array $transicoes)
    {
        $estadoInical = EstadoFactory::criarInicial();
        $tabelaDeAcoes = new TabelaDeAcoes($estadoInical);
        foreach ($transicoes as $transicao) {
            $tabelaDeAcoes->adicionarTransicao($transicao);
        }
        return $tabelaDeAcoes;
    }

}