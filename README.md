# Trytes

This library implements Trytes encoding. It can decode both integers any any arbitrary data.

[![Latest Version](https://img.shields.io/packagist/v/tuupola/trytet.svg?style=flat-square)](https://packagist.org/packages/tuupola/trytes)
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

Note that if you are encoding to and from integer you need to pass boolean `true` as the second argument for `decode()` method. This is because `decode()` does not know if the original data was an integer or binary data.

``` php
$integer = $trytes->encode(987654321); /* 14q60P */
print $trytes->decode("14q60P", true); /* 987654321 */
```

If you prefer you can also use the implicit `decodeInteger()` method.

``` php
$integer = $trytes->encode(987654321); /* 14q60P */
print $trytes->decodeInteger("14q60P"); /* 987654321 */
```

Also note that encoding a string and an integer will yield different results.

``` php
$integer = $trytes->encode(987654321); /* 14q60P */
$string = $trytes->encode("987654321"); /* KHc6iHtXW3iD */
```

## Character sets

By default trytes uses IOTA character set. You can also use any custom character set of 27 unique characters.

```php
use Tuupola\Trytes;

print Trytes:IOTA; /* 9ABCDEFGHIJKLMNOPQRSTUVWXYZ */
print Trytes:HEPTAVINTIMAL; /* 0123456789ABCDEFGHKMNPRTVXZ */

$default = new Trytes(["characters" => Trytes:IOTA]);
$inverted = new Trytes(["characters" => Trytes:HEPTAVINTIMAL]);
print $default->encode("Hello world!"); /* TODO */
print $inverted->encode("Hello world!"); /* TODO */
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
