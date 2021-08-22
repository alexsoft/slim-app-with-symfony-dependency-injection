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
