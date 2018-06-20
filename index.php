<?php

use MaquinaDeTuring\app\controllers\MaquinaDeTuringController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

date_default_timezone_set('America/Sao_Paulo');
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log.txt');
error_reporting(E_ALL);

require 'vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$app = new \Slim\App($configuration);

$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write(file_get_contents(__DIR__.'/public/views/tela-inicial.html'));
    return $response;
});

$app->post('/verificar', function (Request $request, Response $response, array $args) {
    return (new MaquinaDeTuringController())->verificarFita($request->getParsedBody());
});

$app->run();
