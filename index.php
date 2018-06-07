<?php

use MaquinaDeTuring\Estado;
use MaquinaDeTuring\Estados;
use MaquinaDeTuring\Simbolos;
use MaquinaDeTuring\TabelaDeAcoes;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write(file_get_contents(__DIR__.'/public/views/tela_inicial.html'));
    return $response;
});

$app->post('/maquina', function (Request $request, Response $response, array $args) {
    $inicial = new Estado($_POST['inicial']);
    $estados = new Estados($_POST['estados']);
    $simbolos = new Simbolos($_POST['simbolos']);
    (new TabelaDeAcoes($inicial, $estados, $simbolos))->imprimir();
});

try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
    echo $e->getTraceAsString();
} catch (\Slim\Exception\NotFoundException $e) {
    echo $e->getTraceAsString();
} catch (Exception $e) {
    echo $e->getTraceAsString();
}