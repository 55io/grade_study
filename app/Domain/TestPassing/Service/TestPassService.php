<?php

namespace App\Domain\TestPassing\Service;

use App\Domain\TestPassing\DTO\ScoredTestPassDTO;

class TestPassService
{
    protected TestPassRepository $repository;

    public function __construct(TestPassRepository $repository)
    {
        $this->repository = $repository;
    }

    public function saveFromDTO(ScoredTestPassDTO $passDTO)
    {
        $testPass = new TestPass();
        $testPass->userId = $passDTO->userId;
        $testPass->testId = $passDTO->testId;
        $this->repository->save($testPass);
    }
}