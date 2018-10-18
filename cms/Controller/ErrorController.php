<?php

namespace Cms\Controller;

use Engine\BaseController\CmsController;


class ErrorController extends CmsController {


    public function page404() {

        echo "<h1>404 Page</h1>";

    }

}