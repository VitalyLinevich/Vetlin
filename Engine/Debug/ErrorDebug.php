<?php

namespace Engine\Debug;


class ErrorDebug extends Debug {

    protected static $debug = ENV;

    protected static function productionDebug() {
        if (self::$debug === 'dev') {
            return true;
        } elseif (self::$debug === 'prod') {
            echo '<h1>A server error has occurred.</h1>';die;
        }
    }

    public static function noParams($wrong_param){
        self::productionDebug();
        echo "<h1>Fatal Vetlin Error!</h1>
                <p>\Engine\BaseController\Controller::errorPage() has no parameter '".$wrong_param."'</p>";
    }

    public static function noDirForView($dirName) {
        self::productionDebug();
        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the view, because there is no necessary folder!<br>
                    You must create a folder "'.$dirName.'" here - frontend/view/</p>';
        exit();
    }

    public static function noFileForView($fileName, $dirName) {
        self::productionDebug();
        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the view, because there is no necessary file!<br>
                    You must create a file "'.$fileName.'" here - frontend/view/'.$dirName.'</p>';
        exit();
    }

    public static function noCssFile($path) {
        self::productionDebug();
        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the css file, because there is no necessary file!<br>
                    You must create such file - '.$path.'</p>';
        exit();
    }

    public static function noJsFile($path) {
        self::productionDebug();
        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the javascript file, because there is no necessary file!<br>
                    You must create such file - '.$path.'</p>';
        exit();
    }

}