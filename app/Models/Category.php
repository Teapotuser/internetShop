<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Traits\BestSellers;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BestSellers;

    protected $fillable = [
        'code', 'name', 'description', 'picture' 
       ];
    public function products() : HasMany {
        return $this->hasMany(Product::class);
    }   
}
