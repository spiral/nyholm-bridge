<?php

declare(strict_types=1);

namespace Spiral\Nyholm\Tests\Nyholm;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Spiral\Boot\BootloadManager\BootloadManager;
use Spiral\Boot\BootloadManager\Initializer;
use Spiral\Core\Container;
use Spiral\Http\Config\HttpConfig;
use Spiral\Nyholm\Bootloader\NyholmBootloader;

class ResponseFactoryTest extends TestCase
{
    public function testBindings(): void
    {
        $c = new Container();
        $b = new BootloadManager($c, $c, $c, new Initializer($c, $c));
        $b->bootload([NyholmBootloader::class]);

        $c->bind(HttpConfig::class, new HttpConfig([
            'headers' => [
                'Content-Type' => 'text/html; charset=UTF-8'
            ],
        ]));

        /** @var ResponseInterface $r */
        $r = $c->get(ResponseFactoryInterface::class)->createResponse(200);
        $this->assertContains('text/html; charset=UTF-8', $r->getHeader('Content-Type'));
    }
}
