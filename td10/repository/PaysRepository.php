<?php

require_once('../repository/ItemsRepository.php');

class PaysRepository extends ItemsRepository
{
    protected $hostname = 'localhost';
    protected $username = 'pays';
    protected $password = 'azert123';
    protected $dbname = 'td10';

    public function findAll()
    {
        $connection = $this->getConnection();
        $query = "SELECT * FROM pays";
        $statement = $connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $connection = $this->getConnection();
        $query = "SELECT * FROM pays WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($object)
    {
        $connection = $this->getConnection();
        $query = "INSERT INTO pays (label, population) VALUES (:label, :population)";
        $statement = $connection->prepare($query);
        $label = $object->getLabel();
        $population = $object->getPopulation();
        $statement->bindParam(':label', $label, PDO::PARAM_STR);
        $statement->bindParam(':population', $population, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function update($object)
    {
        $connection = $this->getConnection();
        $query = "UPDATE pays SET label = :label WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $object->getId(), PDO::PARAM_INT);
        $statement->bindParam(':label', $object->getLabel(), PDO::PARAM_STR);
        return $statement->execute();
    }
    public function delete($id)
    {
        $connection = $this->getConnection();
        $query = "DELETE FROM pays WHERE id = :id";
        $statement = $connection->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function getIdByLabel($label)
    {
        $connection = $this->getConnection();
        $query = "SELECT id FROM pays WHERE name = :label";
        $statement = $connection->prepare($query);
        $statement->bindParam(':label', $label, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }

    private function getConnection()
    {
        try {
            $dsn = "mysql:host={$this->hostname};dbname={$this->dbname};charset=utf8";
            return new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

?>