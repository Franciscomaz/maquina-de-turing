<?php

use MaquinaDeTuring\app\controllers\MaquinaDeTuringController;

class MaquinaDeTuringTest extends PHPUnit\Framework\TestCase
{
    public function testSoma()
    {
        $conteudoJson = file_get_contents(__DIR__.'/arquivos/soma.json');
        $json = (new MaquinaDeTuringController())->verificarFita($conteudoJson);
        print_r($json);
        die;
    }
}
