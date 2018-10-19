<?php

namespace Engine\BaseController;

use Engine\DI\DI;
use Engine\BaseController\ErrorController;
use Engine\Debug\ErrorDebug;


class Controller extends BaseController {

    public function __construct(DI $di, $class) {
        parent::__construct($di, $class);
    }

    public function errorPage($param) {

        if ($param == '404') {

            $controller = new ErrorController($this->di);

            return $controller->page404();

        } elseif ($param == '403') {

            $controller = new ErrorController($this->di);

            return $controller->page403();

        } else {

            ErrorDebug::noParams($param);

        }

    }

    public function render($file, $param = []) {

        return $this->view->render($file, $param);

    }

}