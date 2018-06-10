<?php

namespace MaquinaDeTuring;

class Simbolo
{
    const VAZIO = ' ';
    private $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public static function criarVazio()
    {
        return new self(self::VAZIO);
    }

    public function nome()
    {
        return $this->nome;
    }
}
