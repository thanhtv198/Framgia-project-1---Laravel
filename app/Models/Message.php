<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "messages";

    protected $fillable = [
        'sender_id',
        'sender_name',
        'receiver_id',
        'key', 'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
