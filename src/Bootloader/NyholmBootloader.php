<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
declare(strict_types=1);

namespace Spiral\Nyholm\Bootloader;

use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Spiral\Boot\Bootloader\Bootloader;

final class NyholmBootloader extends Bootloader
{
    const SINGLETONS = [
        ServerRequestFactoryInterface::class => [self::class, 'factory'],
        ResponseFactoryInterface::class      => [self::class, 'factory'],
        StreamFactoryInterface::class        => [self::class, 'factory'],
        UploadedFileFactoryInterface::class  => [self::class, 'factory'],
        UriFactoryInterface::class           => [self::class, 'factory']
    ];

    /**
     * @return Psr17Factory
     */
    protected function psr17Factory(): Psr17Factory
    {
        return new Psr17Factory();
    }
}