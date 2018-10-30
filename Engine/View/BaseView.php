<?php

namespace Engine\View;


abstract class BaseView {

    protected $controllerName;

    // config/template.config.php
    public $config;


    public function __construct($controllerName) {

        $this->controllerName = $controllerName;

        $this->config = require BASE_DIR . '/' . APP . '/config/template.config.php';

    }

}