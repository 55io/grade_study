<?php

namespace App\Storage;

use App\Domain\Common\AbstractEntity;
use App\Storage\Connection\ConnectionInterface;

abstract class AbstractEntityStorage
{
    protected ConnectionInterface $connection;
    protected string $table;

    function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    public function findById(int $id): bool
    {
        $query = "SELECT id from {$this->table} where id = \"$id\"";
        return $this->connection->makeQuery($query) !== null;
    }

    abstract public function getById(int $id): ?AbstractEntity;

    abstract public function insert(AbstractEntity $entity): bool;
    abstract public function update(AbstractEntity $entity): bool;
    abstract public function delete(AbstractEntity $entity): bool;
    abstract protected function createEntityFromRow($row): AbstractEntity;

    public function getTable(): string
    {
        return $this->table;
    }

}