<?php

namespace Engine\Debug;


class ErrorDebug extends Debug {

    public static function noParams($wrong_param){

        echo "<h1>Fatal Vetlin Error!</h1>
                <p>\Engine\BaseController\Controller::errorPage() has no parameter '".$wrong_param."'</p>";


    }

    public static function noDirForView($dirName) {

        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the view, because there is no necessary folder!<br>
                    You must create a folder "'.$dirName.'" here - frontend/view/</p>';
        exit();

    }

    public static function noFileForView($fileName, $dirName) {
        echo '<h1>Fatal Vetlin Error!</h1>
                <p>Unable to load the view, because there is no necessary file!<br>
                    You must create a file "'.$fileName.'" here - frontend/view/'.$dirName.'</p>';
        exit();
    }

}