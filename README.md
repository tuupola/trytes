# Trytes

This library implements Trytes encoding. It can decode both integers any any arbitrary data.

[![Latest Version](https://img.shields.io/packagist/v/tuupola/trytes.svg?style=flat-square)](https://packagist.org/packages/tuupola/trytes)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/tuupola/trytes/master.svg?style=flat-square)](https://travis-ci.org/tuupola/trytes)
[![Coverage](http://img.shields.io/codecov/c/github/tuupola/trytes.svg?style=flat-square)](https://codecov.io/github/tuupola/trytes)

## Install

Install with [composer](https://getcomposer.org/).

``` bash
$ composer require tuupola/trytes
```

## Usage

``` php
$trytes = new Tuupola\Trytes;

$encoded = $trytes->encode(random_bytes(128));
$decoded = $trytes->decode($encoded);
```

## Character sets

By default this library uses the [IOTA](http://iota.org/) style character set. Shortcut is provided also for [Heptavintimal](http://homepage.divms.uiowa.edu/~jones/ternary/hept.shtml) characters. If required you can use any custom character set of 27 unique characters.

```php
use Tuupola\Trytes;

print Trytes::IOTA; /* 9ABCDEFGHIJKLMNOPQRSTUVWXYZ */
print Trytes::HEPTAVINTIMAL; /* 0123456789ABCDEFGHKMNPRTVXZ */

$default = new Trytes(["characters" => Trytes::IOTA]);
$heptavintimal = new Trytes(["characters" => Trytes::HEPTAVINTIMAL]);
print $default->encode("Hello world!"); /* RBTC9D9DCDEAKDCDFD9DSCFA */
print $heptavintimal->encode("Hello world!"); /* K2N304043451B4346404M361 */
```

## Static Proxy (not implemented)

If you prefer to use static syntax use the provided static proxy.

``` php
use Tuupola\TrytesProxy as Trytes;

$encoded = Trytes::encode(random_bytes(128));
$decoded = Trytes::decode($encoded);
```

## Testing

You can run tests either manually or automatically on every code change. Automatic tests require [entr](http://entrproject.org/) to work.

``` bash
$ make test
```
``` bash
$ brew install entr
$ make watch
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email tuupola@appelsiini.net instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
