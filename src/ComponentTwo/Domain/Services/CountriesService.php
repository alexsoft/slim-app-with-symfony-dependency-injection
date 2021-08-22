<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Domain\Services;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Domain\Contracts\CountriesRepository;

class CountriesService
{
    public function __construct(private CountriesRepository $countriesRepository)
    {
    }


    /**
     * @return string[]
     */
    public function get(): array
    {
        return $this->countriesRepository->get();
    }
}
