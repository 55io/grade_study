<?php

namespace App\Domain\Common;

trait NamedEntityTrait
{
    protected ?string $name;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
}