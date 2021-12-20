<?php

namespace App\Domain\TestPassing\Service;

use App\Domain\TestPassing\DTO\TestPassDTO;
use App\Domain\TestPassing\Repository\TestQuestionRepository;
use App\Domain\TestPassing\Repository\TestRepository;

class TestService
{
    protected TestRepository $repository;

    protected int $testId;

    private TestResultService $resultService;
    private TestPassService $testPassService;

    public function __construct(TestRepository $testRepository,
        TestResultService $resultService,
        TestPassService $testPassService)
    {
        $this->repository = $testRepository;
        $this->resultService = $resultService;
        $this->testPassService = $testPassService;
    }

    public function setId(int $id)
    {
        if($this->idExists($id)) {
            $this->testId = $id;
        }
        throw new \Exception("Test not found by id $id", 404);
    }

    public function getTestBySetId()
    {
        $this->validateTestId();
        return $this->repository->getTestWithQuestionsById($this->testId)->getPublicData();
    }

    public function getTestPassResult(TestPassDTO $testPassDTO): TestPassDTO
    {
        $answersDTO = $this->repository->getAnswersById($testPassDTO->testId);
        $scoredPassDTO = $this->resultService->calculateTestResult($testPassDTO, $answersDTO);
        $this->testPassService->saveFromDTO($scoredPassDTO);
        return $scoredPassDTO;
    }

    private function idExists(int $id): bool
    {
        return $this->repository->findById($id);
    }

    // TODO Вытащить валидацию в объект-значение для Id
    private function validateTestId()
    {
        if($this->testId === null) {
            throw new \Exception("Test id not set", 500);
        }
    }
}