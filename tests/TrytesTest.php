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

        $encoded2 = TrytesProxy::encode($data);
        $decoded2 = TrytesProxy::decode($encoded2);
        $this->assertEquals($encoded2, "ICIC");
        $this->assertEquals($decoded2, $data);
    }

    /*  https://github.com/iotaledger/iota.lib.py/blob/master/docs/types.rst* */

    public function testShouldEncodeAndDecodeHelloIota()
    {
        $data = "Hello, IOTA!";

        $encoded = (new Trytes)->encode($data);
        $decoded = (new Trytes)->decode($encoded);
        $this->assertEquals($encoded, "RBTC9D9DCDQAEASBYBCCKBFA");
        $this->assertEquals($decoded, $data);

        $encoded2 = TrytesProxy::encode($data);
        $decoded2 = TrytesProxy::decode($encoded2);
        $this->assertEquals($encoded2, "RBTC9D9DCDQAEASBYBCCKBFA");
        $this->assertEquals($decoded2, $data);
    }

    public function testShouldEncodeAndDecodeRandomBytes()
    {
        $data = random_bytes(81);

        $encoded = (new Trytes)->encode($data);
        $decoded = (new Trytes)->decode($encoded);
        $this->assertEquals($decoded, $data);

        $encoded2 = TrytesProxy::encode($data);
        $decoded2 = TrytesProxy::decode($encoded2);
        $this->assertEquals($decoded2, $data);
    }

    public function testShouldThrowInvalidArgumentException()
    {
        $this->setExpectedException("InvalidArgumentException");
        $data = "012345";
        $encoded = (new Trytes)->decode($data);
    }
}
