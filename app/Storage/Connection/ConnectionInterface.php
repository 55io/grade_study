<?php

namespace App\Storage\Connection;

interface ConnectionInterface
{
    public function makeQuery(string $query);
}