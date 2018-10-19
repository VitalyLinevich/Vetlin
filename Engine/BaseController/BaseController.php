<?php

namespace Engine\BaseController;

use Engine\DI\DI;
use Engine\View\View;

abstract class BaseController {

    protected $di;

    protected $db;

    // object \Engine\View\View
    protected $view;

    // Name of class controller
    protected $class;


    public function __construct(DI $di, $class) {

        $this->di = $di;

        $this->class = $class;

        $this->view = new View($class);

    }

}
