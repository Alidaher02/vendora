<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Enums\StoreStatus;

class Store extends Model
{
protected $fillable = [
    'vendor_id',
    'name',
    'slug',
    'description',
    'address',
    'phone',
    'image',
    'status',
];
    public function vendor()
    {
        return $this->belongsTo(User::class , 'vendor_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

        public function categories()
    {
        return $this->hasMany(Category::class);
    }

    protected function casts(): array
{
    return [
        'status' => StoreStatus::class,
    ];
}
}
