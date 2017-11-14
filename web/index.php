<?php

use IdNet\Wafer\Application;
use YtProxy\GetAudio;
use Zend\Diactoros\Response\EmptyResponse;
use Zend\Diactoros\Response\SapiEmitter;

require __DIR__.'/../vendor/autoload.php';

try {
    Application::run([

        'routes' => [
            ['GET', '/{id:[-_0-9a-zA-Z]+}', GetAudio::class]
        ]

    ]);
}
catch (Exception $exception) {
    (new SapiEmitter)->emit(new EmptyResponse(404));
}
