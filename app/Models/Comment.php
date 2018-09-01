<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'content',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

    public function scopeGetById($query, $id)
    {
        return $query->where('product_id', $id)->get();
    }
}
