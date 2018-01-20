<?php


namespace app\controllers;


use app\services\Request;
use app\services\RequestNotMatchException;
use app\services\FileNotFoundException;

class FrontController extends Controller
{
    private $controller;
    private $action;

    private $defaultController = "Product";

    public function actionIndex()
    {
        try {
            $rm = new Request();
        } catch (RequestNotMatchException $e) {
            ob_end_clean();
            header("HTTP/1.0 404 Not Found");
            exit;
        }


        $controllerName = $rm->getControllerName() ?: $this->defaultController;
        $this->action = $rm->getActionName();

        $this->controller = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller";
        try {
            $controller = new $this->controller(
                new \app\services\renderers\TemplateRenderer()
            );
        } catch (FileNotFoundException $e) {
            ob_end_clean();
            header("HTTP/1.0 404 Not Found");
            exit;
        }
        $controller->run($this->action);
    }
}