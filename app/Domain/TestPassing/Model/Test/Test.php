<?php

namespace App\Domain\Course\TestPassing\Model\Test;

use App\Domain\Common\AbstractEntity;
use App\Domain\Common\NamedEntityTrait;

//TODO Не очень удачное имя?
class Test extends AbstractEntity
{
    use NamedEntityTrait;
    public array $questionList = [];
}