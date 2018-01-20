<?php
include "../config/main.php";
include "../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$db = \app\services\Db::getInstance();
echo "<pre>";
$product = new \app\models\Product();
var_dump($product->getAll());
echo "</pre>";


