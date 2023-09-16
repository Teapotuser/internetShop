<?php

namespace App\Http\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

trait BestSellers
{
    function getBestSellers(): \Illuminate\Support\Collection
    {
        return Product::withCount(['orders' => function (Builder $query) {
            $query->where('status', '<>', 'cancelled');
        }])
            ->when($this instanceof \App\Models\Category, function (Builder $builder) {
                return $builder->where('category_id', $this->id);
            })
            ->when($this instanceof \App\Models\Collection, function (Builder $builder) {
                return $builder->where('collection_id', $this->id);
            })
            ->IsActive()
            ->OrderByRaw('orders_count DESC, RAND()')
            ->limit(5)
            ->get();
    }
}
