<?php

namespace frontend\controllers;

use Engine\BaseController\Controller;


class HomeController extends Controller {

    public function index() {
        echo "Hello! It is Vetlin!";
    }

    public function news() {

        echo "News Page";

    }

}