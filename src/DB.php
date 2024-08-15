<?php
namespace App;

use PDO;

class DB
{
    public static function connect(): PDO
    {
        // Assuming you're loading the .env file somewhere else or it's already loaded
        $dsn = http_build_query([
            'host' => $_ENV['DB_HOST'],
            'dbname' => $_ENV['DB_NAME'],
        ], numeric_prefix: '', arg_separator: ';');

        return new PDO(
            $_ENV['DB_CONNECTION'] . ":$dsn",
            $_ENV['DB_USER'],
            $_ENV['DB_PASS'],
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]
        );
    }
}
