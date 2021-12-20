<?php

namespace App\Application;

use App\Controller\TestController;

class Router
{
    CONST ROUTES = [
        '/test/view' => [
            'controller' => TestController::class,
            'action' => 'view',
            'dep' => 'testView'
            ]
    ];

    public function run()
    {
        $request = $_SERVER['REQUEST_URI'];
        if(!array_key_exists($request, self::ROUTES)) {
            http_response_code(404);
        }

        $controllerClass = self::ROUTES[$request]['controller'];
        try{
            $controller = new $controllerClass();
            $controller->self::ROUTES[$request]['action']();
        } catch (\Throwable $exception) {
            http_response_code(500);
        }
    }
}