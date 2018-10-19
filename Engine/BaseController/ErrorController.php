<?php

namespace Engine\BaseController;


class ErrorController extends Controller {


    // Page not found
    public function page404() {

        echo "<div style='text-align: center;'><h1>404</h1>";
        echo "<h3>Page not found!</h3></div>";

    }

    // Forbidden ("access denied")
    public function page403() {

        echo "<div style='text-align: center;'><h1>403</h1>";
        echo "<h3>Forbidden!</h3></div>";

    }

}