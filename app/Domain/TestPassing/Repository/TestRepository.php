<?php

namespace App\Domain\TestPassing\Repository;

use App\Domain\Course\TestPassing\Model\Test\Test;
use App\Storage\TestStorage;

class TestRepository
{
    private TestQuestionRepository $questionRepository;

    private TestStorage $storage;

    public function __construct(TestQuestionRepository $questionRepository, TestStorage  $storage) {

        $this->questionRepository = $questionRepository;
        $this->storage = $storage;
    }

    public function findById(int $id): bool
    {
        return $this->storage->findById($id);
    }

    public function getTestWithQuestionsById(int $id): Test
    {
        $test = $this->storage->getById($id);
        $test->questionList = $this->questionRepository->getAllByTestId($id);
        return $test;
    }

}