<?php

namespace Engine;

use Engine\Core\Router\DispatchedRoute;
use Engine\Helper\Common;

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

            $this->router->add('home', '/', 'HomeController:index');
            $this->router->add('\news', '/news', 'HomeController:news');

            $routerDispatch = $this->router->dispatch(Common::getMethod(), Common::getPathUri());

            $namespace = '\\Frontend\\Controllers\\';

            if ($routerDispatch == null) {
                $routerDispatch = new DispatchedRoute('ErrorController:page404');
                $namespace = '\\Engine\\BaseController\\';
            }

            list($class, $action) = explode(':', $routerDispatch->getController(), 2);

            $controller = $namespace . $class;
            $parameters = $routerDispatch->getParameters();
            call_user_func_array([new $controller($this->di), $action], $parameters);

        } catch (\Exception $e) {
            echo $e->getMessage();
            exit;
        }


    }

}