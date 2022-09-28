<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;
require __DIR__ . '/vendor/autoload.php';


require __DIR__ . '/entidades/usuario.php';
require __DIR__ . '/controlador/usuarioControlador.php';


$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    // $routeContext = RouteContext::fromRequest($request);
    // $routingResults = $routeContext->getRoutingResults();
    // $methods = $routingResults->getAllowedMethods();
    
    $response = $handler->handle($request);
    
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'get,post,put,delete,option');
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);

    // Optional: Allow Ajax CORS requests with Authorization header
    // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');

    return $response;
});
    
    $app->get('/', function (Request $request, Response $response, $args) {
        $response->getBody()->write('"Hello world! Regrese"');
        return $response;
    }); 

$app->post('/identificador/', usuarioControlador::class.':mostrarUsuario');

$app->run();

//ejecutar terminal en htost/api
//php -S localhost:8080 -t public index.php

?>