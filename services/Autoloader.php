<?php

namespace app\services;

class FileNotFoundException extends \Exception{}

class Autoloader
{
    private $fileExtension = ".php";

    function loadClass($className)
    {
        $className = str_replace("app\\", ROOT_DIR, $className);
        $className = str_replace("\\", "/", $className) . $this->fileExtension;
        if (!(file_exists($className))) {
            throw new FileNotFoundException();
        }
        include $className;
    }
}