<?php

abstract class ItemsRepository
{
    abstract public function findAll();

    abstract public function insert($object);

    abstract public function findById($id);

    abstract public function update($object);

    abstract public function delete($id);
}

?>