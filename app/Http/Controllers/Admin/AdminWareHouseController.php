<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\WarehouseExport;
use Illuminate\Support\Str;
use App\Models\{Product, Category};
class AdminWareHouseController extends Controller
{
    public function index(Request $request){
    	$warehoses = Product::with('cate:id,c_name');
    	$categories = Category::select('id','c_name')->get();
    	if($request->id){
    		$warehoses = $warehoses->where('id',$request->id)->orderByDesc('id');
    	}
    	if($request->type){
    		if($request->type == 1){
    			$warehoses = $warehoses->orderByDesc('pro_pay');	
    		}
    		if($request->type == 2){
    			$warehoses = $warehoses->orderBy('pro_pay');	
    		}
    		if($request->type == 3){
    			$warehoses = $warehoses->orderByDesc('pro_view');	
    		}
    		if($request->type == 4){
    			$warehoses = $warehoses->orderByDesc('pro_review_total');	
    		}
    		
    	}
    	if($request->category){
    		$warehoses = $warehoses->where('pro_category_id',$request->category)->orderByDesc('id');
    	}
    	$warehoses = $warehoses->paginate(10);
    	if($request->export){
    		//dd($request->export);
            return \Excel::download(new WarehouseExport($warehoses), Str::random(40).'kho.xlsx');
        }
    	$query = $request->query();
    	//dd($Categories);
    	return view('admin.warehouse.index',compact('warehoses','categories','query'));
    }
}
