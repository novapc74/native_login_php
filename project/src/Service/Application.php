<?php

namespace App\Service;

use App\Controller\UndefinedPageController;
use JetBrains\PhpStorm\NoReturn;

class Application
{
    private array $handlers = [];

    public function get(string $route, array $handler): void
    {
        $this->append('GET', $route, $handler);
    }

    public function post(string $route, array $handler): void
    {
        $this->append('POST', $route, $handler);
    }

    #[NoReturn]
    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $item) {

            list($handlerMethod, $route, $handler) = $item;
            list($class, $classMethod) = $handler;

            $argument = $this->getArgument($route, $uri);
            $isMethod = $method === $handlerMethod;

            if ($isMethod && $route === $uri) {
                echo (new $class())->$classMethod();
                die();
            }

            if ($isMethod && null != $argument) {
                echo (new $class())->$classMethod($argument);
                die();
            }
        }

        echo (new UndefinedPageController())->index();
        die();
    }

    private function append(string $method, string $route, array $handler): void
    {
        $this->handlers[] = [$method, $route, $handler];
    }

    private function getArgument(string $route, string $uri): null|string
    {
        if (!str_contains($route, '{id}')) {
            return null;
        }

        if ($this->getMainPath($uri) != $this->getMainPath($route)) {
            return null;
        }

        $arg = explode('/', $uri);

        return array_pop($arg);
    }

    private function getMainPath($path): string
    {
        $data = explode('/', $path);
        array_pop($data);

        return implode('/', $data) . '/';
    }
}