<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Infrastructure\IndexAction;
use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../config/container.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$app->getRouteCollector()
    ->setDefaultInvocationStrategy(new RequestResponseArgs());

$app->addErrorMiddleware(true, true, true);

$app->get(
    '/',
    IndexAction::class
);

$app->run();
