<?php

namespace App\View;

class ViewResolver
{
    private const TEMPLATE_DIR = __DIR__ . '/../../templates/';
    private array $data;
    private string $path;
    private string $template;

    public function __construct(string $path, array $data)
    {
        $this->data = $data;
        $this->path = $path;
    }

    public function createView(): string
    {

        $data = $this->data;

        $this->setTemplate(include self::TEMPLATE_DIR . $this->getPath());

        return $this->getTemplate();
    }

    public function renderView(): string
    {
        return $this->getTemplate();
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
    }
}