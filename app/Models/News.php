<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    
    protected $fillable = [
        'id',
        'title',
        'content',
        'avatar',
        'created_at',
        'updated_at'
    ];

    public function scopeGetNews($query)
    {
        return $query->orderBy('id', 'DESC')->get();
    }
}
