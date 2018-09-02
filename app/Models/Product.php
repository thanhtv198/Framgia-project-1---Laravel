<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable;

    protected $table = 'products';
    protected $fillable = [
        'id',
        'name',
        'price',
        'description',
        'promotion',
        'date_manufacture',
        'user_id',
        'category_id',
        'manufacture_id',
        'color',
        'os',
        'screen',
        'front_camera',
        'back_camera',
        'ram',
        'cpu',
        'sim',
        'memory',
        'pin',
        'battery',
        'status',
        'views',
        'remove',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customizeProducts()
    {
        return $this->hasMany(CustomizeProduct::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    public function scopeSearch($query, $request)
    {
        return $query->where('name', 'ilike', '%' . $request . '%')->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchCommon($query, $key, $user_id)
    {
        return $query->where('name', 'ilike', '%' . $key . '%')
            ->orWhere('description', 'ilike', '%' . $key . '%')
            ->orWhereIn('user_id', $user_id)
            ->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchNameDes($query, $key)
    {
        return $query->where('name', 'ilike', '%' . $key . '%')
            ->orWhere('description', 'ilike', '%' . $key . '%')
            ->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProduct'));
    }

    public function scopeSearchName($query, $name)
    {
        return $query->where('name', 'ilike', '%' . $name . '%')->where('remove', 0)->paginate(config('app.paginateProductSearch'));
    }

    public function scopeDiscount($query)
    {
        return $query->where('promotion', '<>', 0)->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProduct'));
    }

    public function scopeViews($query)
    {
        return $query->where('remove', 0)->orderBy('created_at', 'DESC')->where('status', 1)->take(config('app.paginateProduct'))->get();
    }

    public function scopeGetProduct($query)
    {
        return $query->where('remove', 0)->where('status', 1)->orderBy('created_at', 'DESC')->paginate(config('app.paginateProductSearch'));
    }

    public function scopeProductCheck($query)
    {
        return $query->where('status', 0)->orderBy('created_at', 'DESC');
    }

    public function scopeGetById($query, $id)
    {
        return $query->findOrFail($id)->where('remove', 0)->first();
    }

    public function scopeAccept($query, $id)
    {
        return $query->where('id', $id)->update(['status' => 1, 'check' => '']);
    }

    public function scopeReject($query, $id, $content)
    {
        return $query->where('id', $id)->update(['status' => 2, 'check' => $content]);
    }

    public function scopeUpdateViews($query, $id, $views)
    {
        return $query->where('id', $id)->update(['views' => $views + 1]);
    }

    public function scopeGetAll($query)
    {
        return $query->where('remove', 0)->orderBy('id', 'DESC')->get();
    }

    public function scopeGetCategory($query, $id)
    {
        return $query->where('category_id', $id)->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }

    public function scopeGetManufacture($query, $id)
    {
        return $query->where('manufacture_id', $id)->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceBetween($query, $from, $to)
    {
        return $query->whereBetween('price', [$from, $to])->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceFrom($query, $from)
    {
        return $query->where('price', '>=', $from)->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }

    public function scopePriceTo($query, $to)
    {
        return $query->where('price', '<=', $to)->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }

    public function scopeGetByAddress($query, $array)
    {
        return $query->whereIn('user_id', $array)->orderBy('id', 'DESC')->where('remove', 0)->where('status', 1)->paginate(config('app.paginateProductSearch'));
    }
}

