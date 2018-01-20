<?php

namespace app\controllers;

use app\services\renderers\IRenderer;
use app\services\renderers\TemplateRenderer;

abstract class Controller
{
    private $action;
    protected $layout = "main";
    protected $useLayout = true;
    protected $defaultAction = "index";

    /** @var TemplateRenderer */
    private $renderer = null;

    /**
     * Controller constructor.
     * @param IRenderer|null $renderer
     */
    public function __construct(IRenderer $renderer = null)
    {
        $this->renderer = $renderer;
    }

    public function run($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $action = "action" . ucfirst($this->action);
        $this->$action();
    }

    public function render($template, $params)
    {
        if ($this->useLayout) {
            $params = $this->prepareParams($params);
        }
        return $this->renderer->render($template, $params);
    }

    abstract public function actionIndex();

    private function prepareParams($params) {
        $newParams = [];
        foreach ($params as $paramName => $paramValue) {
            if (gettype($paramValue) == "string") {
                $newParams[$paramName] = $paramValue;
            } elseif (gettype($paramValue) == "array" && count($paramValue) > 0) {
                $newParams[$paramName] = "";
                foreach ($paramValue as $paramTemplate => $paramParams) {
                    $newParams[$paramName] .= $this->renderer->render($paramTemplate, $paramParams);
                }
            }
        }
        return $newParams;
    }
}