<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Infrastructure;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Domain\Entities\Thing;
use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentOne\Domain\Services\ThingsService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexAction
{
    public function __construct(private ThingsService $thingsService)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $payload = [
            '_incoming' => $request->getQueryParams(),
            'data' => $this->mapThings($this->thingsService->getAll()),
        ];

        $response->getBody()->write(json_encode($payload, JSON_THROW_ON_ERROR));

        return $response;
    }

    /**
     * @param Thing[] $things
     * @return array<array{id: int, name: string}>
     */
    private function mapThings(array $things): array
    {
        return array_map(
            static fn (Thing $thing): array => ['id' => $thing->id(), 'name' => $thing->name()],
            $things
        );
    }
}
