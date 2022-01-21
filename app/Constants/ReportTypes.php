<?php

namespace App\Constants;

use Illuminate\Support\Arr;

class ReportTypes
{
    public const PRODUCTS = 'products';

    public static function supported(): array
    {
        return Arr::wrap(self::PRODUCTS);
    }
}
