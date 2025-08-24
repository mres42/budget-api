<?php

namespace App\Config;

use PDOException;

class Database
{
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    private int $port;
    private ?\PDO $connection = null;

    private function __construct()
    {
        $this->host = $_ENV['DB_HOST'];
        $this->db = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASS'];
        $this->port = $_ENV['DB_PORT'] ?? 3306;
    }

    public static function getInstance(): self
    {
        static $instance = null;
        if ($instance === null) {
            $instance = new self();
        }
        return $instance;
    }

    public function getConnection(): \PDO
    {
        if ($this->connection === null) {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db};charset=utf8mb4";
        }

        try {
            $this->connection = new \PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
        return $this->connection;
    }
}
