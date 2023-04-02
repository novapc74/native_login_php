<?php

namespace App\Service;

class DataBase
{
    private const DB_PATH = __DIR__ . '/../../database/database.txt';
    protected static ?self $instance = null;

    public function __construct()
    {
    }

    public static function getInstance(): ?self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getDB($table, $context = null): array
    {
        if ($context) {
            file_put_contents(self::DB_PATH, json_encode($context));
        }

        return json_decode(file_get_contents(self::DB_PATH), true);
    }

}