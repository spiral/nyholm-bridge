<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */
declare(strict_types=1);

namespace Spiral\Nyholm\Tests;

use Nyholm\Psr7\Factory\Psr17Factory;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Spiral\Boot\BootloadManager;
use Spiral\Core\Container;
use Spiral\Http\Config\HttpConfig;
use Spiral\Nyholm\Bootloader\NyholmBootloader;
use Spiral\Nyholm\ResponseFactory;

class BootloaderTest extends TestCase
{
    public function testBindings()
    {
        $c = new Container();
        $b = new BootloadManager($c);
        $b->bootload([NyholmBootloader::class]);

        $c->bind(HttpConfig::class, new HttpConfig([
            'headers' => [
                'Content-Type' => 'text/html; charset=UTF-8'
            ],
        ]));

        $this->assertInstanceOf(Psr17Factory::class, $c->get(ServerRequestFactoryInterface::class));
        $this->assertInstanceOf(ResponseFactory::class, $c->get(ResponseFactoryInterface::class));
        $this->assertInstanceOf(Psr17Factory::class, $c->get(StreamFactoryInterface::class));
        $this->assertInstanceOf(Psr17Factory::class, $c->get(UploadedFileFactoryInterface::class));
        $this->assertInstanceOf(Psr17Factory::class, $c->get(UriFactoryInterface::class));
    }
}