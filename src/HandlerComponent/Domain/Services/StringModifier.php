<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Contracts\Modifier;
use Assert\Assertion;
use Assert\AssertionFailedException;

class StringModifier
{
    /**
     * @param Modifier[] $modifiers
     */
    public function __construct(private array $modifiers)
    {
    }

    /**
     * @throws AssertionFailedException
     */
    public function modify(string $string): string
    {
        Assertion::notEmpty($string);

        foreach ($this->modifiers as $modifier) {
            $string = $modifier->modify($string);
        }

        return $string;
    }
}
