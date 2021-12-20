<?php

namespace App\Domain\Common;

use http\Exception\BadMethodCallException;

abstract class AbstractEntity
{
    protected ?int $id = null;

    public function setId(int $id): void
    {
        if($this->id !== null) {
            throw new BadMethodCallException('Id already setted!');
        }
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}