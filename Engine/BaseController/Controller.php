<?php

namespace Engine\BaseController;

use Engine\DI\DI;


class Controller extends BaseController {

    public function __construct(DI $di) {
        parent::__construct($di);
    }

    public function header() {



    }

}