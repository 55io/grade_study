<?php

namespace App\Domain\TestPassing\Context;

use App\Domain\Common\AbstractContext;
use App\Domain\TestPassing\Service\TestService;

final class DownloadTestContext extends AbstractContext
{
    protected $service;

    public function __construct(TestService $service) {
        $this->service = $service;
    }
    public function run()
    {
        try {
            $this->service->setId($this->propertyList->id);
        } catch (\Throwable $e) {
            //do something(log mb)
            throw new \Exception($e->getMessage(), $e->getCode());
        }
        return $this->service->getTestBySetId();
    }
}