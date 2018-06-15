<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Estado;
use MaquinaDeTuring\domain\EstadoDeParada;

class EstadoFactory
{
    public static function criar($estado)
    {
        if((boolean)$estado['deveParar']){
            return new EstadoDeParada($estado['nome'], $estado['aceitar']);
        } else {
            return new Estado($estado['nome']);
        }
    }
}
