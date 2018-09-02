<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';
    
    protected $fillable = [
        'id',
        'role'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
