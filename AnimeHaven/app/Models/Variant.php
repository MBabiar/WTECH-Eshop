<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Variant extends Model
{
    use HasFactory;

    /**
     * Get the product of variant.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}