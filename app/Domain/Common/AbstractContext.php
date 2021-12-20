<?php

namespace App\Domain\Common;

use http\Exception\BadMethodCallException;

abstract class AbstractContext
{
    protected $propertyList = null;

    abstract public function run();

    /**
     * @param null $propertyList
     */
    public function setPropertyList($propertyList): void
    {
        $this->propertyList = $propertyList;
    }

}