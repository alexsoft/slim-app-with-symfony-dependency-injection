<?php

declare(strict_types=1);

namespace Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Infrastructure;

use Alexsoft\SlimAppWithSymfonyDependencyInjection\HandlerComponent\Domain\Services\StringModifier;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ShowAction
{
    public function __construct(private StringModifier $stringModifier)
    {
    }


    public function __invoke(Request $request, Response $response): Response
    {
        $query = $request->getQueryParams();

        $payload = [
            'data' => [
                'word' => $this->stringModifier->modify($query['word'] ?? '')
            ]
        ];

        $response->getBody()->write(json_encode($payload, JSON_THROW_ON_ERROR));

        return $response;
    }
}
