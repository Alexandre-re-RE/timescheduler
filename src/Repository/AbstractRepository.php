<?php

namespace App\Repository;

use App\Database\Database;
use PDO;

/**
 * Abstract repository
 *
 * @property \PDO $db
 */
abstract class AbstractRepository
{

    private $db;

    protected $primaryKey = 'id';

    public function __construct()
    {
        $this->db = (new Database())->getDb();
    }

    /**
     * Get the table name
     *
     * @return string
     */
    abstract public function getTable();

    /**
     * Get the entity class name
     *
     * @return string
     */
    abstract public function getEntityClass();

    /**
     * Find by id
     *
     * @param string $id
     * @return mixed
     */
    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->getTable()} WHERE {$this->primaryKey} = :id");
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->getEntityClass());

        $result = $stmt->fetch();

        return $result;
    }

    /**
     * Find by id
     *
     * @param string $id
     * @return mixed
     */
    public function findAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->getTable()}");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_CLASS, $this->getEntityClass());

        return $result;
    }

    /**
     * Find by id
     *
     * @param string $id
     * @return mixed
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->getTable()} WHERE {$this->primaryKey} = :id");
        $stmt->bindValue('id', $id);

        $result = $stmt->execute();

        return $result;
    }
}
