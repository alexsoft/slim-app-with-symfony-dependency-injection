<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Infrastructure\Repostories\InMemoryThingsRepository;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services
        ->load(
            'Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\\',
            '../src/ComponentOne/'
        )
        ->exclude(
            [
                './Domain/Entities',
                './Domain/Exceptions',
                './services.php',
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
};
