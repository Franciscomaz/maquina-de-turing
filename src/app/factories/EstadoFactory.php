<?php

namespace MaquinaDeTuring\app\factories;

use MaquinaDeTuring\domain\Estado;
use MaquinaDeTuring\domain\EstadoDeParada;

class EstadoFactory
{
    public static function criar($estado)
    {
        if($estado == Estado::ESTADO_DE_ACEITACAO){
            return new EstadoDeParada($estado, true);
        } else if($estado == Estado::ESTADO_DE_REJEICAO){
            return new EstadoDeParada($estado, false);
        } else {
            return new Estado($estado);
        }
    }

    public static function criarInicial()
    {
        return new Estado('->');
    }
}
