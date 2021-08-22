<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Infrastructure;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\ComponentTwo\Domain\Services\CountriesService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class IndexAction
{
    public function __construct(private CountriesService $countriesService)
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {
        $payload = [
            '_incoming' => $request->getQueryParams(),
            'data' => $this->countriesService->get(),
        ];

        $response->getBody()->write(json_encode($payload, JSON_THROW_ON_ERROR));

        return $response;
    }
}
