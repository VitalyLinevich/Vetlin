<?php

namespace Engine\Debug;

use Engine\DI\DI;


abstract class BaseDebug {

    protected $di;

    public $env = ENV;
    public $debug = false;

    public function __construct(DI $di) {

        $this->di = $di;

        if ($this->env == 'dev') {
            $this->debug = true;
        } elseif ($this->env == 'prod') {
            $this->debug = false;
        }

    }

}