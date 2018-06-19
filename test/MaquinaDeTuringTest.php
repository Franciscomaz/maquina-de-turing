<?php

use MaquinaDeTuring\app\controllers\MaquinaDeTuringController;
use PHPUnit\Framework\TestCase;

class MaquinaDeTuringTest extends TestCase
{
    public function testSoma()
    {
        $conteudoJson = json_decode(file_get_contents(__DIR__.'/arquivos/soma.json'), true);
        $json = (new MaquinaDeTuringController())->verificarFita($conteudoJson);
        $arrayAssociativo = json_decode($json, true);
        $this->assertEquals(true, $arrayAssociativo['isValido']);
    }
}
