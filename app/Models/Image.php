<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'id',
        'product_id',
        'image',
        'stt',
        'created_at',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeUpdateImgProduct($query, $id, $i, $name)
    {
        return $query->where('product_id', $id)
            ->where('stt', $i)
            ->update(['image' => $name]);
    }
}
