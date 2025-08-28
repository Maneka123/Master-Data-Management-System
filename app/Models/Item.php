<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
class Item extends Model
{
    use HasFactory;
    protected $guarded=[];

   

public function brand()
{
    return $this->belongsTo(Brand::class, 'brand_id');
}

public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
