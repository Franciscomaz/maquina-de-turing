<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\MaquinaDeTuring;

class MaquinaDeTuringFactory
{
    public static function criar($dados)
    {
        $fita = FitaFactory::criar($dados['fita']);
        $tabelaDeAcoes = TabelaDeAcoesFactory::criar($dados['tabela']);
        $estadoInicial = EstadoFactory::criar($dados['tabela']['estadoInicial']);

        return new MaquinaDeTuring($estadoInicial, $fita, $tabelaDeAcoes);
    }
}
