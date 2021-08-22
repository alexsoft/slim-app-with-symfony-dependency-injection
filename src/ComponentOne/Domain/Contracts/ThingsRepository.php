<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Domain\Contracts;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Domain\Exceptions\ThingNotFound;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Domain\Entities\Thing;

interface ThingsRepository
{
    /**
     * @return Thing[]
     */
    public function getAll(): array;

    /**
     * @throws ThingNotFound
     */
    public function getById(int $id): Thing;
}
