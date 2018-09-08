<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    protected $table = 'responds';

    protected $fillable = [
        'id',
        'user_id',
        'title',
        'content',
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGetAll($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function scopeSearch($query, $request)
    {
        return $query->where('title', 'like', '%' . $request . '%')
            ->orwhere('content', 'like', '%' . $request . '%');
    }
}
