<?php

namespace App\Controller;

use App\ArrayableDTOView;
use App\Domain\TestPassing\Context\DownloadTestContext;
use App\Domain\TestPassing\Context\UploadTestResultContext;

class TestController
{
    protected array $config = [
        'view' => [
            'context' => DownloadTestContext::class,
            'view' => ArrayableDTOView::class
        ]
    ];

    public function view($id)
    {
        $context = new DownloadTestContext();
        $context->setPropertyList(['id' => $id]);
        try {
            $result = $context->run();
            $view = new ArrayableDTOView($result);
            echo $view->render();
        } catch (\Throwable $exception) {
            throw new \Exception('Test not found', 404);
        }
    }

    public function pass(array $data)
    {
        $context = new UploadTestResultContext();
        $context->setPropertyList($data);
        try {
            $result = $context->run();
            $view = new ArrayableDTOView($result);
            echo $view->render();
        } catch (\Throwable $exception) {
            throw new \Exception('Test not found', 404);
        }
    }
}