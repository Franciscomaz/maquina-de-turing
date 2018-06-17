<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Estado;
use MaquinaDeTuring\domain\Simbolo;
use MaquinaDeTuring\domain\TabelaDeAcoes;

class TabelaDeAcoesFactory
{
    public static function criar($dados)
    {
        $tabela = new TabelaDeAcoes(EstadoFactory::criar($dados['estadoInicial']),
            $dados['transicoes'],
            $dados['simbolos']
        );
        foreach ($dados['acoes'] as $acao) {
            $tabela->adicionarAcao(AcaoFactory::criar($acao), new Estado($acao['estado']), new Simbolo($acao['simbolo']));
        }
        return $tabela;
    }

}