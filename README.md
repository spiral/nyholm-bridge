# Spiral Framework: Nylon PSR-7/PSR-17 bridge
[![Latest Stable Version](https://poser.pugx.org/spiral/nylon-bridge/version)](https://packagist.org/packages/spiral/nylon-bridge)
[![Build Status](https://travis-ci.org/spiral/nylon-bridge.svg?branch=master)](https://travis-ci.org/spiral/nylon-bridge)
[![Codecov](https://codecov.io/gh/spiral/nylon-bridge/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/nylon-bridge/)

## Installation
```
$ composer require spiral/nylon-bridge
```

To enable extension modify your application by adding `Spiral\Nylon\Bootloader\NylonBootloader`:

```php
class App extends Kernel
{
    /*
     * List of components and extensions to be automatically registered
     * within system container on application start.
     */
    protected const LOAD = [
        // ...
        
        Spiral\Nylon\Bootloader\NylonBootloader::class,
    ];
}
```