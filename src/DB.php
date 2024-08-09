<?php

declare(strict_types=1);
namespace App;
use PDO;
class DB
{
    public static function connect(): PDO
    {
        $dsn = "{$_ENV['DB_CONNECTION']}:host={$_ENV['DATABASE_HOST']};dbname={$_ENV['DATABASE_NAME']};user={$_ENV['DATABASE_USER']};password={$_ENV['DATABASE_PASS']}";
        return new PDO($dsn);
    }
}