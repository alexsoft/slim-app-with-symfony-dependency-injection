<?php

declare(strict_types=1);

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Contracts\Modifier;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services\StringModifier;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

return static function (ContainerConfigurator $configurator): void {
    $services = $configurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure()
        ->public();

    $services->instanceof(Modifier::class)
        ->tag('handler_component.modifier_implementation');

    $services
        ->load(
            'Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\\',
            '../src/HandlerComponent/'
        )
        ->exclude(
            [
                './Domain/Entities',
                './Domain/Exceptions',
                './services.php',
            ]
        );

    $services->set(StringModifier::class)
        ->arg(
            '$modifiers',
            tagged_iterator('handler_component.modifier_implementation')
        );
};
