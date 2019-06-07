<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
declare(strict_types=1);

namespace Spiral\Nyholm;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Spiral\Http\Config\HttpConfig;

final class ResponseFactory implements ResponseFactoryInterface
{
    /** @var HttpConfig */
    private $config;

    /** @var Psr17Factory */
    private $factory;

    /**
     * @param HttpConfig   $config
     * @param Psr17Factory $factory
     */
    public function __construct(HttpConfig $config, Psr17Factory $factory)
    {
        $this->config = $config;
        $this->factory = $factory;
    }

    /**
     * @param int    $code
     * @param string $reasonPhrase
     * @return ResponseInterface
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        $response = $this->factory->createResponse($code, $reasonPhrase);
        foreach ($this->config->baseHeaders() as $header => $value) {
            $response = $response->withAddedHeader($header, $value);
        }

        return $response;
    }
}