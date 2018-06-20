<?php

namespace MaquinaDeTuring\app\controllers;

use Exception;
use MaquinaDeTuring\app\exception\MaquinaDeTuringException;
use MaquinaDeTuring\app\factories\EstadoFactory;
use MaquinaDeTuring\app\factories\FitaFactory;
use MaquinaDeTuring\app\factories\TabelaDeAcoesFactory;
use MaquinaDeTuring\app\factories\TransicaoFactory;
use MaquinaDeTuring\domain\MaquinaDeTuring;

class MaquinaDeTuringController
{
    public function verificarFita($json)
    {
        try {
            $fita = FitaFactory::criar($json['fita']);
            $transicoes = TransicaoFactory::criar($json['transicoes']);
            $tabelaDeAcoes = TabelaDeAcoesFactory::criar($transicoes);
            $maquinaDeTuring = new MaquinaDeTuring(EstadoFactory::criarInicial(), $fita, $tabelaDeAcoes);
            return json_encode(array_merge(
                    ['isValido' => $maquinaDeTuring->validar()],
                    $maquinaDeTuring->getLog()
                )
            );
        } catch (MaquinaDeTuringException $exception) {
            echo $exception->getMessage();
        } catch (Exception $exception){
            echo 'Erro desconhecido';
        }
    }
}
