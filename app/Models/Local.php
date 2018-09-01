<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locals';

    protected $fillable = [
        'id',
        'name',
        'ember',
        'created_at',
        'updated_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
