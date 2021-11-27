<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Infrastructure\Repositories\InMemoryCountriesRepository;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services
        ->load(
            'Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\\',
            '../src/ComponentTwo/'
        )
        ->exclude(
            [
                './Domain/Entities',
                './Domain/Exceptions',
                './services.php',
            ]
        );

    $services->set(InMemoryCountriesRepository::class)
        ->arg(
            '$countries',
            [
                'Ukraine',
                'Luxembourg',
                'Netherlands',
            ]
        );
};
