<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response;
});
$app->get('/', function (Request $request, Response $response, array $args) {
    return $response;
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