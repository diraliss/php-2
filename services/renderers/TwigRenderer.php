<?php
namespace app\services\renderers;

require_once ROOT_DIR . 'vendor/autoload.php';


use Twig_Environment;
use Twig_Loader_Filesystem;

class TwigRenderer implements IRenderer
{
    public function render($template, $params)
    {
        $template = $this->getTwig()->load($template . ".twig");
        return $template->render($params);
    }

    private function getTwig() {
        $loader = new Twig_Loader_Filesystem(ROOT_DIR . "views");
        $twig = new Twig_Environment($loader);
        return $twig;
    }
}