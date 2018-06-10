<?php

namespace MaquinaDeTuring;

class Estado
{
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
