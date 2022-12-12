<?php

namespace App\Database;

use ErrorException;
use Exception;
use PDO;

class Database
{
    const DEFAULT_DATABASE = 'timescheduler';
    const DEFAULT_USER = 'root';
    const DEFAULT_PASS = '';

    private $db;

    public function __construct(
        $dbname = self::DEFAULT_DATABASE,
        $dbuser = self::DEFAULT_USER,
        $dbpass = self::DEFAULT_PASS
    ) {
        try {
            $this->db = new PDO("mysql:host=localhost:3306;dbname=$dbname", $dbuser, $dbpass);
        } catch (Exception $e) {
            echo($e->getMessage());
        }
    }

    public function getDb()
    {
        if(!$this->db instanceof PDO) {
            throw new ErrorException('unable to connect to db');
        }
        return $this->db;
    }

}
