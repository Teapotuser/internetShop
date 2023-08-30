<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Collection;
// use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'article', 'title', 'description', 'price', 'category_id', 'collection_id', 'size', 'picture', 'discount', 'is_new', 'is_best_selling', 'height', 'width', 'depth', 'material', 'material_filling', 'age_from', 'care_recommend'
       ];
    
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }   
    public function collection() : BelongsTo {
        return $this->belongsTo(Collection::class);
    } 
    
    //округление цены и расчет копеек
    public function price(): Attribute {
        return Attribute::make(get: fn($value) => round($value / 100, 2));
    }

    // есть ли скидка у продукта, используется во View
    public function issetDiscount(): bool
    {
        return $this->discount ? true : false;
    }

    public function scopeIsActive(Builder $query)
    {
        return $query->where('is_active', 1);
    }
    /// Даниил добавил тут
    public function scopeMaxPrice(Builder $query, $price)
    {
        return $query->whereRaw('ROUND(`products`.`price` * (100 - `products`.`discount`) / 100,2)<=' . $price*100);
    }
    public function scopeMinPrice(Builder $query, $price)
    {
        return $query->whereRaw('ROUND(`products`.`price` * (100 - `products`.`discount`) / 100,2)>=' . $price*100);
    }

    public function scopeCustomSort(Builder $query, $sort = null)
    {/* 
        $availableSorts = [
            'date',
            'name-a-z',
            'name-z-a',
            'price-low',
            'price-high'
        ];

        if ($sort && in_array($sort, $availableSorts)) {
            \Session::put('sort', $sort);
        } */

        return match ($sort) {            
            'name-a-z' => $query->orderBy('title'),
            'name-z-a' => $query->orderBy('title', 'DESC'),
            'price-low' => $query->orderByRaw('ROUND(`products`.`price` * (100 - `products`.`discount`) / 100,2) DESC'),
            'price-high' => $query->orderByRaw('ROUND(`products`.`price` * (100 - `products`.`discount`) / 100,2) ASC'),
            default => $query->orderBy('products.id', 'ASC'),
        };
    }


    //Подсчитывает цену со скидкой, округляет + копейки
    public function getPriceWithDiscount(): float
    {
        if ($this->discount == 0)
            return $this->price;

        $price = round($this->price * (100 - $this->discount) / 100, 2);
        return $price;
    }
    // Продукт имеет много images (карусель на странице товара)
    public function images()
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    //мин цена указанная в фильтре товаров (spatie)
    //заменяется в AllowedFilter::scope('price_from') в IndexController.php
   /*  public function scopePriceFrom(Builder $builder, $value): Builder
    {
        return $builder->where('price', '>=', $value * 100);
    } */
    //мах цена указанная в фильтре товаров (spatie)
    //заменяется в AllowedFilter::scope('price_to') в IndexController.php
    /*public function scopePriceTo(Builder $builder, $value): Builder
    {
        return $builder->where('price', '<=', $value * 100);
    } */
}
