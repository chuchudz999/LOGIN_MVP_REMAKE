<?php

namespace App\Lib\Database;

use PDO;

class Database
{
    protected static $connection;

    public static function init(array $config)
    {
        self::$connection = new PDO(
            $config['dsn'],
            $config['username'],
            $config['password']
        );
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection()
    {
        return self::$connection;
    }
}
