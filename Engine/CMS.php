<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Debug\Debug;
use Engine\Helper\Common;
use Engine\Core\Router\RoutesControl;

class CMS {

    private $di;

    public $router;


    public function __construct($di) {

        $this->di = $di;
        $this->router = $this->di->get('router');

    }

    // Run Application
    public function run() {

        try {

            $frameworkDebug = new Debug($this->di);
            if ($frameworkDebug->frameworkDebug() !== true) {
                echo $frameworkDebug->frameworkDebug();die;
            }

            RoutesControl::addRoute($this->router);

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());



            $namespace = '\\'.APP.'\\Controllers\\';

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
                $namespace = '\\Engine\\BaseController\\';
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = $namespace . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di, $class), $action], $parameters);

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

}