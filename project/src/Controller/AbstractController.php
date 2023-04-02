<?php

namespace App\Controller;

use App\View\ViewResolver;

class AbstractController
{
    private const TEMPLATE_PATH = __DIR__ . '/../../templates/';

    public function render($template, $variables = []): ?string
    {

        return $this->getData($template, $variables);
    }

    public function redirectTo(string $route, $variables = [])
    {
        header("Location: http://localhost:8077" . $route, true, 302);
        return $this->getData(null, $variables);
    }

    private function getData($template, $variables): false|string
    {
        extract($variables);
        ob_start();
        (new ViewResolver($template, $variables))->createView();
        return ob_get_clean();
    }
}