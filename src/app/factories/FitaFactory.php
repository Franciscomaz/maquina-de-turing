<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Fita;
use MaquinaDeTuring\domain\Simbolo;

class FitaFactory
{
    public static function criar(array $simbolos): Fita
    {
        $celulas = array_map(function($simbolo){
            return new Simbolo($simbolo);
        }, $simbolos);
        return new Fita($celulas);
    }
}