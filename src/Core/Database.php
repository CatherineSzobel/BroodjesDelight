<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dbConfig = new DBConfig();
            try {
                self::$instance = new PDO(
                    $dbConfig->connString,
                    $dbConfig->username,
                    $dbConfig->password
                );
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                throw $e;
            }
        }
        return self::$instance;
    }
}
