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

namespace Tuupola;

class Trytes
{
    const IOTA = "9ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const HEPTAVINTIMAL = "0123456789ABCDEFGHKMNPRTVXZ";

    private $options = [
        "characters" => Trytes::IOTA,
    ];

    public function __construct($options = [])
    {
        $this->options = array_merge($this->options, (array) $options);
    }

    public function encode($data)
    {
        /* Convert bytes to an array of decimals. */
        $decimals = array_map(function ($character) {
            return ord($character);
        }, str_split($data));

        /* Convert decimals to an array of six trit trytes. */
        $trytes = array_map(function ($input) {
            $string = base_convert($input, 10, 3);
            return str_pad($string, 6, "0", STR_PAD_LEFT);
        }, $decimals);

        /* Convert six trit trytes to pair of characters . */
        $encoded = array_map(function ($input) {
            $input = str_split($input, 3);
            $mst = base_convert($input[1], 3, 10);
            $lst = base_convert($input[0], 3, 10);
            return
                $this->options["characters"][$mst] .
                $this->options["characters"][$lst];
        }, $trytes);

        return implode("", $encoded);
    }

    public function decode($data)
    {
        $data = array_chunk(str_split($data), 2);

        /* Convert two character pairs to array of decimals. */
        $decimals = array_map(function ($input) {
            $first = strpos($this->options["characters"], $input[0]);
            $second = strpos($this->options["characters"], $input[1]);
            return $first + $second * 27;
        }, $data);

        /* Convert decimal array to byte string. */
        return implode("", array_map(function ($input) {
            return chr($input);
        }, $decimals));
    }
}
