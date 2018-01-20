<?php
/**
 * Created by PhpStorm.
 * User: diral
 * Date: 31.10.2017
 * Time: 21:24
 */

namespace app\controllers;


abstract class Controller
{
    protected $action;
    protected $layout = "main";
    protected $useLayout = true;
    protected $defaultAction = "index";

    public function run($action = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $action = "action" . ucfirst($this->action);
        $this->$action();
    }

    public function renderStructure($structure)
    {
        foreach ($structure as $template => $params) {
            if ($this->useLayout) {
                $newParams = [];
                foreach ($params as $paramName => $paramValue) {
                    if (gettype($paramValue) == "string") {
                        $newParams[$paramName] = $paramValue;
                    } elseif (gettype($paramValue) == "array" && count($paramValue) > 0) {
                        $newParams[$paramName] = "";
                        foreach ($paramValue as $paramTemplate => $paramParams) {
                            $newParams[$paramName] .= $this->renderTemplate($paramTemplate, $paramParams);
                        }
                    }
                }
                return $this->renderTemplate($template, $newParams);
            } else {
                return $this->renderTemplate($template, $params);
            }
        }
        return "";
    }

    public function render($template, $params)
    {
        if ($this->useLayout) {
            return $this->renderTemplate("layout/{$this->layout}", ["content" => $this->renderTemplate($template, $params)]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function actionIndex() {}

    public function renderTemplate($template, $params)
    {
        extract($params);
        ob_start();
        $templatePath = ROOT_DIR . "views/{$template}.php";
        include $templatePath;
        return ob_get_clean();
    }
}