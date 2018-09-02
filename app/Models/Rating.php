<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'id',
        'user_id',
        'rateable_id',
        'rateable_type',
        'created_at',
        'updated_at'
    ];

    public function scopeGetUserRating($query, $userId, $rateable_id)
    {
        return $query->where('user_id', $userId)->where('rateable_id', $rateable_id);
    }

    public function scopeUpdateUserRating($query, $userId, $rateable_id, $request)
    {
        return $query->where('user_id', $userId)->where('rateable_id', $rateable_id)->update([
            'rating' => $request,
        ]);
    }
}
