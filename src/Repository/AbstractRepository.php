<?php

namespace App\Repository;

use App\Database\Database;
use App\Entity\EntityInterface;
use PDO;
use ReflectionClass;

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

    public function save(EntityInterface $entity)
    {
        $data = $entity->toArray();

        $checkId = in_array($this->primaryKey, array_keys($data)) && !is_null($data[$this->primaryKey]);

        if ($checkId) {
            return $this->update($entity);
        }

        return $this->insert($entity);
    }

    /**
     * Get columns
     *
     * @return array
     */
    private function getColumns()
    {
        $reflet = new ReflectionClass($this->getEntityClass());
        $columns = $reflet->getProperties();

        $columns = array_map(function ($column) {
            return $column->getName();
        }, $columns);

        return $columns;
    }

    private function insert(EntityInterface $entity)
    {

        $columns = $this->getColumns();

        $columns = array_map(function ($column) {
            return ':' . $column;
        }, $columns);

        $query = "INSERT INTO {$this->getTable()} VALUES (" . implode(', ', $columns) . ") ";

        $stmt = $this->db->prepare($query);

        try {
            $result = $stmt->execute($entity->toArray());
            return $result;
        } catch (\PDOException $ex) {
            var_dump($ex->getMessage());
            die;
            return false;
        }
    }

    private function update(EntityInterface $entity)
    {

        $columns = $this->getColumns();

        unset($columns[array_search($this->primaryKey, $columns)]);

        $columns = array_map(function ($column) {
            return "`$column`" . ' = ' . ':' . $column;
        }, $columns);

        $query = "UPDATE {$this->getTable()} SET " . implode(', ', $columns) . " WHERE {$this->primaryKey} = :{$this->primaryKey}";

        $stmt = $this->db->prepare($query);

        try {
            $result = $stmt->execute($entity->toArray());
            return $result;
        } catch (\PDOException $ex) {
            return false;
        }
    }
}
