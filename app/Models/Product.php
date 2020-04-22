<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Product extends Model
{
    protected $table = 'products';
    public $country = [
        1=>"Việt Nam",
        2=>"Anh",
        3=>"Thụy Sỹ",
        4=>"Mỹ",
        

    ];
    public function country(){
        return Arr::get($this->country,$this->pro_country,"[N\A]");
    }
    public function cate()
    {
        return $this->belongsTo('App\Models\Category', 'pro_category_id');
    }
    public function keywords(){
        return $this->belongsToMany(Keyword::class, 'product_keyword', 'pk_product_id', 'pk_keyword_id');
    }
    public function attributes()
    {
        return $this->belongsToMany(Attributes::class,'product_attribute','pa_product_id','pa_attribute_id');
    }
    
}
