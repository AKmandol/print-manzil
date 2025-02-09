<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'store_id',
        'name'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->hasOneThrough(
            User::class,  // Final model (User)
            Store::class, // Intermediate model (Store)
            'id',         // Foreign key on Store (id in stores table)
            'id',         // Foreign key on User (id in users table)
            'store_id',   // Local key on Product (store_id in products table)
            'user_id'     // Local key on Store (user_id in stores table)
        );
    }
}
