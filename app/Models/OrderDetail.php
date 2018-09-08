<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderDetail extends Model
{

    protected $fillable = [
        'id',
        'user_id',
        'order_id',
        'product_id',
        'quantity',
        'price',
        'status',
        'remove',
        'created_at',
        'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeGetSold($query)
    {
        return $query->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')
            ->where('remove', config('page.order_detail.remove.active'))
            ->get();
    }

    public function scopehandleSold($query, $id)
    {
        return $query->where('id', $id)
            ->update(['status' => config('page.order_detail.remove.inactive')]);
    }

    public function scopeOrderBought($query, $id)
    {
        return $query->where('order_id', $id)
            ->orderBy('id', 'DESC')
            ->get();
    }

    public function scopeCancel($query, $id)
    {
        return $query->where('id', $id)
            ->update(['status' => config('page.order_detail.status.cancel')]);
    }

    public function scopeDeleteOrderDetail($query, $id)
    {
        return $query->where('id', $id)
            ->update(['remove' => config('page.order_detail.remove.inactive')]);
    }
}

