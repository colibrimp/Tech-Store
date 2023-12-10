<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = 'currencies';

    protected $fillable = [
         'id',
         'code',
         'symbol',
         'is_main',
         'rate',
//        'product_id',
          'status'

    ];

    public function scopeByCode($query, $code)
    {
        return $query->where('code', $code);
    }

    public function changeCurrency($currency)
    {
        $this->byCode($currency)->firstOrFail();
    }
}
