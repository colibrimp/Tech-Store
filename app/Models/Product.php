<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'title',
        'description',
        'price',
        'currency',
        'status',
        'category_id',
        'created_at',
        'updated_at'
    ];

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, );
    }
}
