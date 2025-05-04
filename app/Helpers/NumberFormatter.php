<?php

namespace App\Helpers;

class NumberFormatter
{
    public static function shorten($number)
    {
        if ($number >= 1000000) {
            if ($number % 1000000 === 0) {
                return ($number / 1000000) . 'M';
            } else {
                return number_format($number / 1000000, 1) . 'M';
            }
        }

        if ($number >= 1000) {
            if ($number % 1000 === 0) {
                return ($number / 1000) . 'K';
            } else {
                return number_format($number / 1000, 1) . 'K';
            }
        }

        return $number;
    }
}
