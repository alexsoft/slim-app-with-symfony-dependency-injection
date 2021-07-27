<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Services;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Contracts\ThingsRepository;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Entities\Thing;

class ThingsService
{
    public function __construct(
        private ThingsRepository $thingsRepository,
    ) {
    }

    /**
     * @return Thing[]
     */
    public function getAll(): array
    {
        return $this->thingsRepository->getAll();
    }
}
