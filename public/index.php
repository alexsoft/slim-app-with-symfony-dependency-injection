<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\Infrastructure\IndexAction;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->getRouteCollector()
    ->setDefaultInvocationStrategy(new RequestResponseArgs());

$app->addErrorMiddleware(true, true, true);

$app->get(
    '/',
    IndexAction::class
);

$app->run();
