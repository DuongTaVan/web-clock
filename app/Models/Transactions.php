<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
class Transactions extends Model
{
    protected $table = 'transactions';
    protected $status = [
    	1 => [
    		'class'=>'default',
    		'name'=>'Tiếp nhận'
    	],
    	2 => [
    		'class'=>'success',
    		'name'=>'Đang vận chuyển'
    	],
    	3 => [
    		'class'=>'info',
    		'name'=>'Đã bàn giao'
    	],
    	-1 => [
    		'class'=>'danger',
    		'name'=>'Đã hủy'
    	],
    ];
    public function getStatus(){
    	return Arr::get($this->status,$this->tst_status,"N/A");
    }

}
