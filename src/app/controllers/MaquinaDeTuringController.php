<?php

namespace MaquinaDeTuring\app\controllers;

use Exception;
use MaquinaDeTuring\app\factories\MaquinaDeTuringFactory;
use MaquinaDeTuring\domain\Acao;
use MaquinaDeTuring\domain\Estado;
use MaquinaDeTuring\domain\Fita;
use MaquinaDeTuring\domain\MaquinaDeTuring;
use MaquinaDeTuring\domain\Posicao;
use MaquinaDeTuring\domain\TabelaDeAcoes;
use MaquinaDeTuring\domain\Transicao;

class MaquinaDeTuringController
{
    public function verificarFita($json)
    {
        try {
            $transicoes = $json['transicoes'];
            $arrayDeTransicoes = [];
            foreach ($transicoes as $transicao){
                $transicao = explode('=', $transicao);
                $arrayDeTransicoes[] = new Transicao(
                    new Acao($transicao[1]),
                    new Posicao($transicao[0])
                );
            }
            $tabelaDeAcoes = new TabelaDeAcoes(new Estado('->'));
            foreach ($arrayDeTransicoes as $transicao){
                $tabelaDeAcoes->adicionarTransicao($transicao);
            }
            $fita = new Fita(['->', '*', '*', '_', '*', '*']);
            $maquinaDeTuring = new MaquinaDeTuring(new Estado('->'), $fita, $tabelaDeAcoes);
            print_r($maquinaDeTuring);
            exit;
            return json_encode(array_merge(
                    ['isValido' => $maquinaDeTuring->validar()],
                    $maquinaDeTuring->getLog()
                )
            );
        } catch (Exception $exception) {
            return $exception->getTraceAsString();
        }
    }
}
