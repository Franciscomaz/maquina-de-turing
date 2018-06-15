<?php

use MaquinaDeTuring\app\controllers\MaquinaDeTuringController;
use PHPUnit\Framework\TestCase;

class MaquinaDeTuringTest extends TestCase
{
    public function testSoma()
    {
        $conteudoJson = file_get_contents(__DIR__.'/arquivos/soma.json');
        $json = (new MaquinaDeTuringController())->verificarFita($conteudoJson);
        $arrayAssociativo = json_decode($json, true);
        print_r($arrayAssociativo);
        $this->assertEquals(true, $arrayAssociativo['isValido']);
    }
}
