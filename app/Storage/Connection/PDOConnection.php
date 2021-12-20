<?php

namespace App\Storage\Connection;

use PDO;
use PDOException;

class PDOConnection
{
    private string $db;
    private string $user;
    private string $pass;

    public function __construct(string $db, string $user, string $pass)
    {
        $this->db = $db;
        $this->user = $user;
        $this->pass = $pass;
    }

    public function makeQuery(string $query)
    {
        try {
            $dbh = new PDO($this->db, $this->user, $this->pass);
            return $dbh->query($query)->fetchAll();
        } catch (PDOException $e) {
            return null;
        }
    }
}