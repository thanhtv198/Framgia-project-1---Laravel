<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $table = 'manufactures';
    
    protected $fillable = [
        'id',
        'name',
        'avatar',
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
