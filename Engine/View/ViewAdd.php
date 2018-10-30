<?php

namespace Engine\View;

use Engine\Debug\ErrorDebug;


trait ViewAdd {

    // LINK TAGS
    private $linkCssTags = [];
    private $cssCounter = 1;

    public function newCssFile($name) {

        $path = strtolower(APP).'/template/css/'.$name;

        if (!file_exists(BASE_DIR.'/'.$path)) {
            ErrorDebug::noCssFile($path);
        }

        $this->linkCssTags[$this->cssCounter] = '<link rel="stylesheet" href="'.$path.'">';
        $this->cssCounter += 1;

    }

    public function getCssTag() {
        foreach ($this->linkCssTags as $linkCssTag) {
            echo $linkCssTag;
        }

        echo $this->getCssBootstrap();

    }


    // META TAGS
    private $metaTags = [];
    private $metaCounter = 1;

    public function newMetaTag($name, $content) {
        $this->metaTags[$this->metaCounter] = '<meta name="'.$name.'" content="'.$content.'">';
        $this->metaCounter += 1;
    }

    public function getMetaTag() {
        foreach ($this->metaTags as $metaTag) {
            echo $metaTag;
        }
    }


    // SCRIPT TAGS
    private $scriptTags = [];
    private $scriptCounter = 1;

    public function newScriptTag($name) {

        $path = strtolower(APP).'/template/js/'.$name;

        if (!file_exists(BASE_DIR.'/'.$path)) {
            ErrorDebug::noCssFile($path);
        }

        $this->scriptTags[$this->scriptCounter] = '<script src="'.$path.'"></script>>';
        $this->scriptCounter += 1;

    }

    public function getJsTag() {
        foreach ($this->scriptTags as $scriptTag) {
            echo $scriptTag;
        }

        echo $this->getJsBootstrap();

    }


    // Bootstrap
    public function getCssBootstrap() {

        if ($this->config['bootstrap']) {
            $bootstrap = '<link rel="stylesheet" href="/'.strtolower(APP).'/template/bootstrap/css/bootstrap.css">';
            return $bootstrap;
        }

        return '';
    }

    public function getJsBootstrap() {

        if ($this->config['bootstrap']) {
            $bootstrap = '<script src="/'.strtolower(APP).'/template/bootstrap/js/slim.min.js" crossorigin="anonymous"></script>' .
                '<script src="/'.strtolower(APP).'/template/bootstrap/js/popper.min.js"></script>' .
                '<script src="/'.strtolower(APP).'/template/bootstrap/js/bootstrap.min.js"></script>';
            return $bootstrap;
        }

        return '';
    }


    // TITLE
    public function getTitle() {

        if (!$this->title) {
            $this->title = $this->pathToFile;
        }

        return $this->title;

    }

    // Name of App
    public function getAppName() {

        return $this->config['appName'];

    }

}