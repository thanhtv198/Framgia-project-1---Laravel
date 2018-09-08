<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'id',
        'buyer_id',
        'name',
        'email',
        'phone_number',
        'local_id',
        'address',
        'total',
        'note',
        'remove',
        'created_at',
        'updated_at'
    ];

    public function orderdetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function local()
    {
        return $this->belongsTo(Local::class);
    }

    public function scopeGetBuyer($query, $id)
    {
        return $query->where('buyer_id', $id)
            ->orderBy('id', 'DESC')
            ->where('remove', config('page.order.remove.active'))
            ->get();
    }

    public function scopeGetDetail($query, $id)
    {
        return $query->where('id', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeDeleteOrder($query, $id)
    {
        return $query->where('id', $id)
            ->update(['remove' => config('page.order.remove.inactive')]);
    }
}

