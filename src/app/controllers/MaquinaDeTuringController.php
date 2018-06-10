<?php

namespace MaquinaDeTuring\app\controllers;

use Exception;
use MaquinaDeTuring\app\factories\MaquinaDeTuringFactory;

class MaquinaDeTuringController
{
    public function verificarFita($json)
    {
        try {
            $maquinaDeTuring = MaquinaDeTuringFactory::criar(json_decode($json, true));
            return json_encode(array_merge(
                    ['isValido' => $maquinaDeTuring->validar()],
                    $maquinaDeTuring->getLog()
                )
            );
        } catch (Exception $exception) {
            return $exception->getTraceAsString();
        }
    }
}
