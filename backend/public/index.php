<?php

declare(strict_types=1);

use Config\Setup;
use Controller\GraphQL;

require __DIR__ . "/../vendor/autoload.php";


Setup::cros('*');

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->post('/graphql', [GraphQL::class, 'handle']);
    $r->get('/graphql', [GraphQL::class, 'handle']);
    $r->get('/', [GraphQL::class, 'home']);
    $r->post('/', [GraphQL::class, 'home']);
    $r->get('/write', [GraphQL::class, 'write']);
    $r->post('/write', [GraphQL::class, 'write']);
});

$routeInfo = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);


switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler($vars);
        break;
}
