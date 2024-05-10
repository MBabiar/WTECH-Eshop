<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    /**
     * Get the user that owns the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
