<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'user_phone',
        'transportation',
        'payment_method',
        'user_country',
        'user_city',
        'user_zip',
        'user_street',
        'user_house_number',
        'price',
    ];

    /**
     * Get the user that owns the order.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the product variants associated with the order.
     */
    public function variants(): BelongsToMany
    {
        return $this->belongsToMany(Variant::class)->withPivot('amount');
    }
}
