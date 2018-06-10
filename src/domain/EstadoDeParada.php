<?php

namespace MaquinaDeTuring\domain;

class EstadoDeParada extends Estado
{
    private $aceitar;

    public function __construct(string $nome, bool $aceitar)
    {
        parent::__construct($nome);
        $this->aceitar = $aceitar;
    }

    public function isValido()
    {
        return $this->aceitar;
    }

    public function deveParar()
    {
        return true;
    }
}
