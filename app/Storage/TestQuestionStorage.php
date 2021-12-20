<?php

namespace App\Storage;

use App\Domain\Course\TestPassing\Model\Test\Test;
use App\Domain\Course\TestPassing\Model\Test\TestQuestion;
use App\Storage\Connection\ConnectionInterface;

final class TestQuestionStorage extends AbstractEntityStorage
{
    public function __construct(ConnectionInterface $connection)
    {
        $this->table = 'test_question';
        parent::__construct($connection);
    }

    public function insert(TestQuestion $entity): bool
    {
        // TODO: Implement insert() method.
    }

    public function update(TestQuestion $entity): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(TestQuestion $entity): bool
    {
        // TODO: Implement delete() method.
    }

    public function getById(int $id): ?TestQuestion
    {
        $query = "SELECT * FROM {$this->tableName} WHERE id = '$id'";
        $rows = $this->connection->makeQuery($query);
        return $rows !== null && count($rows > 0) ? $this->createEntityFromRow($rows[0]) : null;
    }

    public function getByTestId(int $testId): ?TestQuestion
    {
        $query = "SELECT * FROM {$this->tableName} WHERE testId = '$testId'";
        $rows = $this->connection->makeQuery($query);
        return $rows !== null && count($rows > 0) ? $this->createEntityFromRow($rows[0]) : null;
    }

    protected function createEntityFromRow($row): TestQuestion
    {
        $test = new Test();
        $test->setId($row['id']);
        $test->setName($row['name']);
        return $test;
    }
}