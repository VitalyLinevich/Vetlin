<?php

namespace Cms\Controller;

use Engine\BaseController\CmsController;


class HomeController extends CmsController {

    public function index() {
        echo "Hello! It is Vetlin!";
    }

    public function news() {

        echo "News Page";

    }

}