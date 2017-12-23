<?php

/*
 * This file is part of the Trytes package
 *
 * Copyright (c) 2017 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * See also:
 *   https://github.com/tuupola/trytes
 *   http://homepage.divms.uiowa.edu/~jones/ternary/numbers.shtml
 *   https://iota.readme.io/docs/a-note-on-trinary
 *
 */

namespace Tuupola;

use Tuupola\Trytes;

class TrytesProxy
{
    public static $options = [
        "characters" => Trytes::IOTA,
    ];

    public static function encode($data, $options = [])
    {
        return (new Trytes(self::$options))->encode($data);
    }

    public static function decode($data, $options = [])
    {
        return (new Trytes(self::$options))->decode($data);
    }
}
