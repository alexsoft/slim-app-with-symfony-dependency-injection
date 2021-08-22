<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services\EncloseWithDashesModifier;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services\StringModifier;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services\UppercaseModifier;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\DependencyInjection\Reference;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services->alias('modifier.enclose_with_dashes', EncloseWithDashesModifier::class);
    $services->alias('modifier.uppercase', UppercaseModifier::class);

    $services->set(StringModifier::class)
        ->arg(
            '$modifiers',
            [
                service('modifier.enclose_with_dashes'),
                new Reference('modifier.uppercase'),
            ]
        );
};
