<?php

namespace Engine\Core\Router;


class RoutesControl {


        public static function addRoute($router) {

            $routes = require BASE_DIR . '/' . APP . '/config/routes.php';

            foreach ($routes as $route => $path) {

                $path = explode('/', $path);

                $controller = ucfirst($path[0] . 'Controller:' . $path[1]);

                $router->add($route, $route, $controller);

            }

        }

}