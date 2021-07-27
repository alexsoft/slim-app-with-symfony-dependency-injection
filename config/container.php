<?php

declare(strict_types=1);

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Dumper\PhpDumper;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

$file = __DIR__ . '/../var/cache/container.php';

if (file_exists($file)) {
    require_once $file;
    return new ProjectServiceContainer();
}

$containerBuilder = new ContainerBuilder();

(new PhpFileLoader($containerBuilder, new FileLocator(__DIR__ . '/')))
    ->import('services.php');

$containerBuilder->compile();

$dumper = new PhpDumper($containerBuilder);

file_put_contents($file, $dumper->dump());

return $containerBuilder;
