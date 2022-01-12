<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (Product $product) {
            $product->code = Str::random(10);
        });
    }
}
