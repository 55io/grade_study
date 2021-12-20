<?php

namespace App;

class ArrayableDTOView
{
    protected $dto;
    public function __construct(Arrayable $dto)
    {
        $this->dto = $dto;
    }

    public function render()
    {
        return json_encode($this->DTO) ?? null;
    }
}