<?php

namespace Engine\Debug;

use Engine\DI\DI;


abstract class BaseDebug {

    protected $di;

    public function __construct(DI $di) {

        $this->di = $di;

    }

}