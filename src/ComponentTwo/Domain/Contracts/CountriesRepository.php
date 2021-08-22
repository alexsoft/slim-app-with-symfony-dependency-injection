<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Domain\Contracts;

interface CountriesRepository
{
    /**
     * @return string[]
     */
    public function get(): array;
}
