<?php

namespace Engine\Debug;


class Debug extends BaseDebug {

    protected $appError = true;

    public function frameworkDebug() {

        $html = '<h1>Fatal Vetlin Error</h1>';

        $html .= $this->envDebug();

        if ($this->appError === true) {
            return true;
        }

        return $html;

    }

    public function envDebug() {

        if (ENV == 'dev' || ENV == 'prod') {

            return '';

        } else {

            $this->appError = false;

            return '<div><h3>Index.php | const ENV</h3><p>Parameter "'.ENV.'" has not found.<br>
                <ul>Available options:
                <li>"prod" - The application is in development mode.</li>
                <li>"dev" - The application is in production mode.</li>
                </ul>
                </p></div>';

        }

    }

}