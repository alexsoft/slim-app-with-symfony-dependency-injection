<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Contracts\Modifier;

final class UppercaseModifier implements Modifier
{
    public function modify(string $string): string
    {
        return mb_strtoupper($string);
    }
}
