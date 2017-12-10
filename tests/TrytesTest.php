<?php

/*
 * This file is part of the Trytes package
 *
 * Copyright (c) 2017 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/trytes
 *
 */

namespace Tuupola\Trytes;

use PHPUnit\Framework\TestCase;
use Tuupola\Trytes;
use Tuupola\TrytesProxy;

class TrytesTest extends TestCase
{

    public function testShouldBeTrue()
    {
        $this->assertTrue(true);
    }

    public function testShouldEncodeAndDecodeZ()
    {
        $data = "ZZ";
        $encoded = (new Trytes)->encode($data);
        $decoded = (new Trytes)->decode($encoded);

        $this->assertEquals($encoded, "ICIC");
        $this->assertEquals($decoded, $data);
    }

    public function testShouldEncodeAndDecodeRandomBytes()
    {
        $data = random_bytes(81);
        $encoded = (new Trytes)->encode($data);
        $decoded = (new Trytes)->decode($encoded);

        $this->assertEquals($decoded, $data);
    }
}
