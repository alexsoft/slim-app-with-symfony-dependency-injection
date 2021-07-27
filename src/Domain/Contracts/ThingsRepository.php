<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Contracts;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Exceptions\ThingNotFound;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Entities\Thing;

interface ThingsRepository
{
    /**
     * @return Thing[]
     */
    public function getAll(): array;

    /**
     * @throws ThingNotFound
     */
    public function getById(): Thing;
}
