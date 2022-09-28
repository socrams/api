<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/Entidades/usuario.php';
require __DIR__ . '/Controlador/usuarioControlador.php';

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/kakaka[/]', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->post('/identificador/',UsuarioControlador::class.':mostrarUsuario');

$app->run();

?>