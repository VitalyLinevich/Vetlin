<?php

namespace Engine\View;

use Engine\Debug\ErrorDebug;


class View extends BaseView {

    public function render($file, $param = []) {

        $controller = explode('Controller', $this->controllerName);
        $controller = strtolower($controller[0]);

        $file_dir = BASE_DIR . '/'.APP.'/view/'.$controller;

        if (!file_exists($file_dir)) {
            ErrorDebug::noDirForView($controller);
        }

        $file_name = BASE_DIR . '/'.APP.'/view/'.$controller.'/'.$file.'.php';

        if (!file_exists($file_name)) {
            ErrorDebug::noFileForView($file.'.php', $controller);
        }

        extract($param);

        return require $file_name;
    }

}