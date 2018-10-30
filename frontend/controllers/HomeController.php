<?php

namespace frontend\controllers;

use Engine\BaseController\Controller;


class HomeController extends Controller {

    public function index() {
        $this->view->title = 'Vetlin';

        $this->view->newCssFile('vetlin.css');

        $this->render('index');
    }

    public function news() {

    }

}