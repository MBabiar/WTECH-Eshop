<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'anime',
        'color',
        'popularity',
    ];

    /**
     * Get the variants of the product.
     */
    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class)->select('product_id', 'size', 'stock');
    }

    /**
     * Get the images of the product.
     */
    public function images(): HasMany
    {
        return $this->hasMany(Image::class)->select('id', 'product_id', 'image');
    }
}
