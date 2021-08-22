<?php

declare(strict_types=1);

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
                '../src/*/Domain/Entities',
                '../src/*/Domain/Exceptions',
                '../src/*/services.php',
            ]
        );

    $configurator->import('../src/*/{services}.php');
};
