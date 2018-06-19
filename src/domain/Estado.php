<?php

namespace MaquinaDeTuring\domain;

class Estado
{
    const ESTADO_DE_ACEITACAO = '$';
    const ESTADO_DE_REJEICAO = '!$';

    private $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function nome()
    {
        return $this->nome;
    }

    public function deveParar()
    {
        return false;
    }
}
