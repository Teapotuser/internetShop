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
        'is_paid',
        'track_number',
        'payment_date',       
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order_products(): HasMany
    {
        return $this->hasMany(OrderProducts::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderProducts::class);
    }

    public function orderPrice()
    {
        $price = 0;

        foreach ($this->order_products as $order_product) {
            $price += $order_product->price * $order_product->quantity;
        }

        return $price / 100;
    }

    public function getOrderItemsCount()
    {
        $price = 0;

        foreach ($this->order_products as $order_product) {
            $price += $order_product->quantity;
        }

        return $price;
    }

    public function getUserFIO()
    {
        if ($this->user) {
            $UserFIO = implode(' ', [$this->user->name, $this->user->last_name]);
        } else {
            $UserFIO = implode(' ', [$this->name, $this->last_name]);
        }
        return $UserFIO;
    }

    public function getUserName()
    {
        if ($this->user) {
            $UserFIO = $this->user->name;
        } else {
            $UserFIO = $this->name;
        }
        return $UserFIO;
    }

    public function getUserLastName()
    {
        if ($this->user) {
            $UserFIO = $this->user->last_name;
        } else {
            $UserFIO = $this->last_name;
        }
        return $UserFIO;
    }

    public function getUserPhone()
    {
        if ($this->user) {
            $UserPhone = $this->user->phone_number;
        } else {
            $UserPhone = $this->phone_number;
        }
        return $UserPhone;
    }


    public function getUserEmail()
    {
        if ($this->user) {
            $UserEmail = $this->user->email;
        } else {
            $UserEmail = $this->email;
        }
        return $UserEmail;
    }

    public function getDeliveryMethod()
    {
        return match ($this->delivery_method) {
            'pickup' => 'Самовывоз',
            'post' => 'Почтой',
            default => $this->delivery_method
        };
    }

    public function getPaymentStatus()
    {
        if ($this->is_paid) {
            return 'Да / ' . $this->payment_date->format('d.m.Y');
        } else {
            return 'Нет';
        }
    }

    public function getDeliveryData()
    {

        return implode(' ', [
            $this->zip_code,
            $this->city,
            $this->address
        ]);
    }

    public function getStatusClass()
    {
        return match ($this->status) {
            'New' => 'new',
            'Waiting' => 'waiting',
            default => $this->status
        };
    }

    public function getStatusTitle()
    {
        return match ($this->status) {
            'New' => 'Новый',
            'Waiting' => 'Ожидает подтверждения',
            default => $this->status
        };
    }

    public function getPaymentMethod()
    {
        return match ($this->payment_method) {
            'card' => 'Кредитной картой',
            'cash' => 'Наличными',
            default => $this->payment_method
        };
    }
}
