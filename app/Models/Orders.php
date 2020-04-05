<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';
    public function product()
    {
        return $this->belongsTo(Product::class,'od_product_id');
    }
}
