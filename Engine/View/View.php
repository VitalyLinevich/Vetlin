<?php

namespace Engine\View;

use Engine\Debug\ErrorDebug;
use Engine\Helper\Common;


class View extends BaseView {

    use ViewAdd;

    // Path to the view file
    public $pathToFile;

    // Title of the page
    public $title = false;

    // Result of $this->body(). Content of the view page
    public $content;

    // Parameters send by Controller
    public $params;

    public function render($file, $param = []) {

        $controller = explode('Controller', $this->controllerName);
        $controller = strtolower($controller[0]);

        $file_dir = BASE_DIR . '/'.APP.'/view/'.$controller;

        if (!file_exists($file_dir)) {
            ErrorDebug::noDirForView($controller);
        }

        $this->pathToFile = BASE_DIR . '/'.APP.'/view/'.$controller.'/'.$file.'.php';

        if (!file_exists($this->pathToFile)) {
            ErrorDebug::noFileForView($file.'.php', $controller);
        }

        $this->params = $param;

        $this->getPage();

    }


    public function getPage() {
        require $this->getTemplate();
        echo $this->content;
    }


    public function startPage() {
        ob_start();
    }

    public function endPage() {
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }


    // Snow content of the view file, extract parameters to the view file
    public function body() {
        extract($this->params);
        require $this->pathToFile;
    }


    // Get path to the main template
    public function getTemplate() {

        $templateConfig = $this->config;

        return $templateConfig['mainTemplate'];

    }


}