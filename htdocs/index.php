<?php

use app\models\repositories\ProductRepository;

include "../config/main.php";
include "../services/Autoloader.php";

spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);

$controllerName = isset($_GET["c"]) ? ($_GET["c"] ?: "Product") : "Product";
$actionName = isset($_GET["a"]) ? $_GET["a"] : null;

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";

echo "<h1 style='color: darkgreen'>TwigRenderer</h1>";

$controller = new $controllerClass(
    new \app\services\renderers\TwigRenderer()
);

$controller->run($actionName);


echo "<h1 style='color: darkgreen'>TemplateRenderer</h1>";

$controller = new $controllerClass(
    new \app\services\renderers\TemplateRenderer()
);

$controller->run($actionName);
(new ProductRepository())->create(new \app\models\Product(null,"Assassin's Creed: Origins","",2000));
(new ProductRepository())->delete(new \app\models\Product(null,"Assassin's Creed: Origins","",2000));
(new ProductRepository())->update(new \app\models\Product(3,"South Park: The Fractured But Whole",null,500));

