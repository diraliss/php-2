<?php
include "../config/main.php";
include "../services/Autoloader.php";
include "../vendor/autoload.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
(new \app\controllers\FrontController())->run();