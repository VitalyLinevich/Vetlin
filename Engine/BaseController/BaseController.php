<?php

namespace Engine\BaseController;

use Engine\DI\DI;

abstract class BaseController {

    protected $di;

    protected $db;


    public function __construct(DI $di) {

        $this->di = $di;

    }

}
