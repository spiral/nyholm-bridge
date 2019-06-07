# Spiral Framework: Nylohm PSR-7/PSR-17 bridge
[![Latest Stable Version](https://poser.pugx.org/spiral/nylohm-bridge/version)](https://packagist.org/packages/spiral/nylohm-bridge)
[![Build Status](https://travis-ci.org/spiral/nylohm-bridge.svg?branch=master)](https://travis-ci.org/spiral/nylohm-bridge)
[![Codecov](https://codecov.io/gh/spiral/nylohm-bridge/branch/master/graph/badge.svg)](https://codecov.io/gh/spiral/nylohm-bridge/)

## Installation
```
$ composer require spiral/nylohm-bridge
```

To enable extension modify your application by adding `Spiral\Nylohm\Bootloader\NylonBootloader`:

```php
class App extends Kernel
{
    /*
     * List of components and extensions to be automatically registered
     * within system container on application start.
     */
    protected const LOAD = [
        // ...
        
        Spiral\Nylohm\Bootloader\NylohmBootloader::class,
    ];
}
```

> Make sure to remove default `Spiral\Bootloader\Http\DiactorosBootloader`.