<?php

namespace MaquinaDeTuring;

class RegistradorDeEstados
{
    private $estados = [];

    public function __construct(Estado $estadoInicial)
    {
        $this->estados[] = $estadoInicial;
    }

    public function adicionar(Estado $estado)
    {
        $this->estados[] = $estado;
    }

    public function estadoAtual(): Estado
    {
        return end($this->estados);
    }
}
