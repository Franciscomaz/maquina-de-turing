<?php

use MaquinaDeTuring\app\controllers\MaquinaDeTuringController;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write(file_get_contents(__DIR__ . '/public/views/tela-inicial.html'));
    return $response;
});

$app->post('/verificar', function (Request $request, Response $response, array $args) {
    return (new MaquinaDeTuringController())->verificarFita($request->getParsedBody());
});

$app->get('/teste', function (Request $request, Response $response, array $args) {
    $json = file_get_contents(__DIR__.'/test/arquivos/soma.json');
    $resultado = (new MaquinaDeTuringController())->verificarFita(json_decode($json, true));
    return '{"jsonRecebido":'.$json
        .',"jsonRetornado":'.$resultado
        .'}';
});

try {
    $app->run();
} catch (\Slim\Exception\MethodNotAllowedException $e) {
    echo $e->getMessage();
} catch (\Slim\Exception\NotFoundException $e) {
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}