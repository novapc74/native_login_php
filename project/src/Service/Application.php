<?php

namespace App;

use App\Controller\MainPageController;

class Application
{
    private array $handlers = [];


    public function get(string $route, array $handler): void
    {
        $this->append('GET', $route, $handler);
    }

//    public function post(string $route, callable $handler): void
//    {
//        $this->append('POST', $route, $handler);
//    }

    public function run(): void
    {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->handlers as $item) {
            [$handlerMethod, $route, $handler] = $item;
            [$class, $classMethod] = $handler;
            $argument = $this->getArgument($route, $uri);
            $isMethod = $method === $handlerMethod;
            if($isMethod && $route === $uri) {
                $controllerClass = new MainPageController();
                
                echo $controllerClass->index();
            } elseif ($isMethod && $argument) {
                echo $handler($argument);
            }
        }
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