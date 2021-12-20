<?php

namespace App\Domain\Course\TestPassing\Model\Test;

use App\Domain\Common\AbstractEntity;
use App\Domain\Common\NamedEntityTrait;

abstract class AbstractQuestion extends AbstractEntity
{
    use NamedEntityTrait;
    public string $questionText;
}