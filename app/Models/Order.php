<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'name',
        'last_name',
        'email',
        'phone_number',
        'address',
        'city',
        'zip_code',
        'delivery_method',
        'payment_method',
        'status',        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProducts::class);
    }

    public function orderPrice()
    {
        $price = 0;

        foreach ($this->order_products as $order_product) {
            $price += $order_product->price * $order_product->quantity;
        }

        return $price / 100;
    }
}
