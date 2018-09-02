<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';

    protected $fillable = [
        'id',
        'title',
        'avatar',
        'created_at',
        'updated_at'
    ];

    public function scopeGetSlide($query)
    {
        return $query->orderBy('id', 'DESC')->get();
    }
    public function scopeSearch($query, $request)
    {
        return $query->where('title', 'ilike', '%' . $request . '%')->get();
    }
}

