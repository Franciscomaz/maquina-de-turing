<?php

namespace MaquinaDeTuring;

use Exception;

class Fita
{
    private $cursor;
    private $celulas;

    public function __construct($cursor, $celulas)
    {
        $this->cursor = 0;
        $this->celulas = [];
    }

    /**
     * @param $direcao
     * @throws Exception
     */
    public function mover($direcao)
    {
        if($direcao === 'direita'){
            $this->cursor++;
        } else if($direcao==='esquerda'){
            $this->cursor--;
        } else {
            throw new Exception('Direção invalida.');
        }
    }

    public function escrever(Simbolo $simbolo)
    {

    }
}
