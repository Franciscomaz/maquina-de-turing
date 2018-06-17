<?php

namespace MaquinaDeTuring\domain;

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

    public function validar(): bool
    {
        $estadoAtual = $this->registradorDeEstados->estadoAtual();
        $simboloAtual = $this->fita->simboloAtual();
        $acao = $this->tabelaDeAcoes->proximaAcao($estadoAtual, $simboloAtual);

        $this->executarAcao($acao);

        if ($acao->proximoEstado()->deveParar()) {
            return $acao->proximoEstado()->isValido();
        } else {
            return $this->validar();
        }
    }

    private function executarAcao(Acao $acao)
    {
        $this->log[] = [
            'escrever' => $acao->simbolo(),
            'direcao'  => $acao->direcao()
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
