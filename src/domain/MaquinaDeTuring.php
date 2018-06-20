<?php

namespace MaquinaDeTuring\domain;

use Exception;
use MaquinaDeTuring\app\exception\MaquinaDeTuringException;
use MaquinaDeTuring\app\utils\Log;

class MaquinaDeTuring implements Log
{
    private $log = [];
    private $fita;
    private $tabelaDeAcoes;
    private $registradorDeEstados;

    public function __construct(Estado $inicial, Fita $fita, TabelaDeAcoes $tabelaDeAcoes)
    {
        $this->fita = $fita;
        $this->tabelaDeAcoes = $tabelaDeAcoes;
        $this->registradorDeEstados = new RegistradorDeEstados($inicial);
    }

    /**
     * @return bool
     * @throws MaquinaDeTuringException
     */
    public function validar(): bool
    {
        $limite = 0;
        do {
            if($limite++ > 1000){
                throw new MaquinaDeTuringException('Entrou em loop infinito.');
            }
            $estadoAtual = $this->registradorDeEstados->estadoAtual();
            $simboloAtual = $this->fita->simboloAtual();
            $acao = $this->tabelaDeAcoes->proximaAcao($estadoAtual, $simboloAtual);
            $this->executarAcao($acao);
        } while (!$acao->proximoEstado()->deveParar());

        return $acao->proximoEstado()->isValido();
    }

    private function executarAcao(Acao $acao)
    {
        $this->log[] = [
            'escrever' => $acao->simbolo()->nome(),
            'direcao' => $acao->direcao()
        ];
        $this->fita->escrever($acao->simbolo());
        $this->fita->mover($acao->direcao());
        $this->registradorDeEstados->adicionar($acao->proximoEstado());
    }

    public function getLog()
    {
        return [
            'fita' => $this->log,
            'tabela' => $this->tabelaDeAcoes->getLog()
        ];
    }
}
