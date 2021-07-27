<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Entities\Thing;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Services\ThingsService;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Infrastructure\Repostories\InMemoryThingsRepository;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services
        ->load(
            'Alexsoft\SlimAppWithSymfonyDependencyInjection\\',
            '../src/'
        )
        ->exclude(
            [
                '../src/Domain/Entities',
                '../src/Domain/Exceptions',
            ]
        );

    $services->set(InMemoryThingsRepository::class)
        ->arg(
            '$items',
            [
                [
                    'id' => 1,
                    'name' => 'first',
                ],
                [
                    'id' => 3,
                    'name' => 'third',
                ],
                [
                    'id' => 10,
                    'name' => 'tenth',
                ],
            ]
        );

    $services->set(ThingsService::class)
        ->arg('$items', [5, 10, 15]);
};
