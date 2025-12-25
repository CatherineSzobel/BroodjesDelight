<?php

namespace App\Core;

use Dotenv\Dotenv;

class DBConfig
{
    public string $connString;
    public string $username;
    public string $password;

    public function __construct()
    {
        // Load .env file
        $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2));
        $dotenv->load();

        $this->connString = "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'] . ";charset=utf8";
        $this->username = $_ENV['DB_USERNAME'];
        $this->password = $_ENV['DB_PASSWORD'];
    }
}
