<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Estado;
use MaquinaDeTuring\domain\EstadoDeParada;

class EstadoFactory
{
    public static function criar($estado)
    {
        if($estado == '$'){
            return new EstadoDeParada($estado, true);
        } else {
            return new Estado($estado);
        }
    }
}
