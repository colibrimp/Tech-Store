<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $fillable = [
        'id',
        'title',
        'status',
        'product_id',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
