<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomizeProduct extends Model
{
    protected $table = 'customize_products';
    protected $fillable = [
        'id',
        'product_id',
        'property',
        'detail',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
