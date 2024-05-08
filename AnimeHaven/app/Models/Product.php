<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'anime',
        'color',
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

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only('name', 'description');
    }
}
