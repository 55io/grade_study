<?php

namespace App\Domain\TestPassing\Service;

use App\Domain\TestPassing\DTO\AnswerDTO;
use App\Domain\TestPassing\DTO\AnswersDTO;
use App\Domain\TestPassing\DTO\TestPassDTO;

// TODO вытащить в аггрегатор Test?
class TestResultService
{
    public static function calculateTestResult(TestPassDTO $passDto, AnswersDTO $answersDTO): TestPassDTO
    {
        $passDto->score = static::calculatePassScore($passDto, $answersDTO);
        return $passDto;
    }

    protected static function calculatePassScore(TestPassDTO $passDto, AnswersDTO $answersDTO): int
    {
        $score = 0;
        foreach ($answersDTO->answers as $id => $question) {
            if(!array_key_exists($id, $passDto->answers)) {
                continue;
            }
            $score += self::calculateQuestionScore($passDto->answers[$id], $question);
        }
        return $score;
    }

    protected static function calculateQuestionScore(AnswerDTO $passAnswer, AnswerDTO $questionAnswer)
    {
        return $passAnswer->value === $questionAnswer->value ? 1 : 0;
    }
}