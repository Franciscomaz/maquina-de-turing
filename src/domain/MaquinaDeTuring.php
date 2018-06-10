<?php

namespace MaquinaDeTuring;

use MaquinaDeTuring\app\utils\Log;

class MaquinaDeTuring implements Log
{
    private $fita;
    private $tabelaDeAcoes;
    private $registradorDeEstados;

    public function __construct(Estado $inicial, Fita $fita, TabelaDeAcoes $tabelaDeAcoes)
    {
        $this->fita = $fita;
        $this->tabelaDeAcoes = $tabelaDeAcoes;
        $this->registradorDeEstados = new RegistradorDeEstados($inicial);
    }

    public function validar(): bool
    {
        $acao = $this->tabelaDeAcoes->proximaAcao($this->registradorDeEstados->estadoAtual(), $this->fita->simboloAtual());

        $this->executarAcao($acao);

        if($acao->proximoEstado()->deveParar()){
            return $acao->proximoEstado()->isValido();
        } else {
            $this->validar();
        }
    }

    private function executarAcao(Acao $acao){
        $this->fita->escrever($acao->simbolo());
        $this->fita->mover($acao->direcao());
        $this->registradorDeEstados->adicionar($acao->proximoEstado());
    }

    public function getLog()
    {
        return [
            'fita' => $this->fita->getLog(),
            'tabela' => $this->tabelaDeAcoes->getLog()
        ];
    }
}
