<?php

namespace App\Database;

use ErrorException;
use Exception;
use PDO;

class Database
{

    private $db;

    public function __construct()
    {
        $config = require CONFIG_FILE;

        $host = $config['database']['host'];
        $port = $config['database']['port'];
        $database = $config['database']['database'];

        try {

            $this->db = new PDO(
                "mysql:host=$host:$port;dbname=$database",
                $config['database']['username'],
                $config['database']['password']
            );
        } catch (Exception $e) {
            echo ($e->getMessage());
        }
    }

    public function getDb()
    {
        if (!$this->db instanceof PDO) {
            throw new ErrorException('unable to connect to db');
        }
        return $this->db;
    }
}
