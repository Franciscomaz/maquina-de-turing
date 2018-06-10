<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\Estado;
use MaquinaDeTuring\EstadoDeParada;

class EstadoFactory
{
    public static function criar($estado)
    {
        if($estado['final']){
            return new EstadoDeParada($estado['nome'], $estado['aceitar']);
        } else {
            return new Estado($estado['nome']);
        }
    }
}
