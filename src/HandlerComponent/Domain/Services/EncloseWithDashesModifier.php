<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Contracts\Modifier;

final class EncloseWithDashesModifier implements Modifier
{
    private const DASHES_COUNT = 2;

    public function modify(string $string): string
    {
        $dashes = str_repeat('-', self::DASHES_COUNT);

        return "{$dashes}{$string}{$dashes}";
    }
}
