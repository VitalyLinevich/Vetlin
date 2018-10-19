<?php

namespace frontend\controllers;

use Engine\BaseController\Controller;


class HomeController extends Controller {

    public function index() {
        echo "Hello! It is Vetlin!";
    }

    public function news() {

        $hello = 'Hello Vetlin';

        $this->render('index', [
            'text' => $hello,
        ]);

    }

}