<?php

namespace Engine\View;


abstract class BaseView {

    protected $controllerName;

    public function __construct($controllerName) {

        $this->controllerName = $controllerName;

    }

}