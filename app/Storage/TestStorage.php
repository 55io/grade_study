<?php

namespace App\Storage;

use App\Domain\Course\TestPassing\Model\Test\Test;
use App\Storage\Connection\ConnectionInterface;

final class TestStorage extends AbstractEntityStorage
{
    public function __construct(ConnectionInterface $connection)
    {
        $this->table = 'test';
        parent::__construct($connection);
    }

    public function insert(Test $entity): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(Test $entity): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(Test $entity): bool
    {
        // TODO: Implement delete() method.
    }

    public function getById(int $id): ?Test
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id = '$id'";
        $rows = $this->connection->makeQuery($query);
        return $rows !== null && count($rows > 0) ? $this->createEntityFromRow($rows[0]) : null;
    }


    protected function createEntityFromRow($row): Test
    {
        $test = new Test();
        $test->setId($row['id']);
        $test->setName($row['name']);
        return $test;
    }
}