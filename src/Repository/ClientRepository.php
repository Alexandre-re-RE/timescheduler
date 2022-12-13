<?php

class ClientRepository {
    private PDO|null $db = null;

    protected ?string $table = null;

    public function __construct()
    {
        $this->db = (new Database("cakephp", "cakephp", "cakephp"))->getDb();
    }

    abstract public function getEntityClassName();

    public function all()
    {
        $listObject = $this->db->query("SELECT * FROM $this->table")->fetchAll(PDO::FETCH_CLASS, $this->getEntityClassName());
        return $listObject;
    }

    public function getById($id)
    {
        $query = $this->db->query("SELECT * FROM $this->table WHERE id = $id LIMIT 1");
        $query->setFetchMode(PDO::FETCH_CLASS, $this->getEntityClassName());
        $object = $query->fetch();
        return $object;
    }

    public function save($entity)
    {
//        $query = "INSERT INTO $this->table ()";
//        foreach (get_class_vars($this->getEntityClassName()) as $tableColName) {
//            $query .= $tableColName . ' '
//        }
    }

    public function delete($id)
    {
        $object = $this->getById($id);
        $query = $this->db->query("DELETE FROM $this->table WHERE id = $id");
        return $query->execute();
    }
}
