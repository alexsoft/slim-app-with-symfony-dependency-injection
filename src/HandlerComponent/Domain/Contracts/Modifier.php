<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Contracts;

interface Modifier
{
    /**
     * @param non-empty-string $string
     *
     * @return string
     */
    public function modify(string $string): string;
}
