<?php

declare(strict_types=1);

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

$file = __DIR__ . '/../var/cache/container.php';

$containerConfigCache = new ConfigCache($file, false);

if (!$containerConfigCache->isFresh()) {
    $containerBuilder = new ContainerBuilder();

    (new PhpFileLoader($containerBuilder, new FileLocator(__DIR__ . '/')))
        ->import('services.php');

    $containerBuilder->compile();

    $dumper = new PhpDumper($containerBuilder);

    $containerConfigCache->write(
        $dumper->dump(),
        $containerBuilder->getResources()
    );
}

require_once $file;

return new ProjectServiceContainer();
