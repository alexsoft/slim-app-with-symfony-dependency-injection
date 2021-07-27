<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\Infrastructure\Repostories;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Contracts\ThingsRepository;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Entities\Thing;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\Domain\Exceptions\ThingNotFound;

class InMemoryThingsRepository implements ThingsRepository
{
    /**
     * @param Thing[] $items
     */
    public function __construct(private array $items)
    {
        $this->items = array_combine(
            array_map(
                static fn(array $thing): int => $thing['id'],
                $items
            ),
            array_map(
                static fn(array $thing): Thing => new Thing($thing['id'], $thing['name']),
                $items
            )
        );
    }

    public function getAll(): array
    {
        return array_values($this->items);
    }

    public function getById(int $id): Thing
    {
        return $this->items[$id] ?? throw new ThingNotFound("Thing with id {$id} does not exist.");
    }
}
