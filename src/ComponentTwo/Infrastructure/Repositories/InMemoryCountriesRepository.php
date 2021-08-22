<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Infrastructure\Repositories;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Domain\Contracts\CountriesRepository;

class InMemoryCountriesRepository implements CountriesRepository
{
    /**
     * @param string[] $countries
     */
    public function __construct(private array $countries)
    {
    }

    public function get(): array
    {
        return $this->countries;
    }
}
