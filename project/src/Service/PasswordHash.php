<?php

namespace App\Service;

class PasswordHash
{
    public static function hashPassword($password): string
    {
        return password_hash($password, null);
    }

    public static function isPasswordValid($password, $hashPassword): bool
    {
        return password_verify($password, $hashPassword);
    }
}