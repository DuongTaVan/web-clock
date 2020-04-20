<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Product, Transactions, Rating};
use App\User;
class AdminStatisticalController extends Controller
{
    public function index(){
    	$totalProducts = Product::count();
    	$totalTransactions = Transactions::count();
    	$totalRatings = Rating::count();
    	$totalUsers = User::count();
    	//dd($totalProducts);
    	// Thống kê trạng thái đơn hàng
        // Tiep nhan
        $transactionDefault = Transactions::where('tst_status',1)->select('id')->count();
        // dang van chuyen
        $transactionProcess = Transactions::where('tst_status',2)->select('id')->count();
        // Thành công
        $transactionSuccess = Transactions::where('tst_status',3)->select('id')->count();
        //Cancel
        $transactionCancel = Transactions::where('tst_status',-1)->select('id')->count();

        $statusTransaction = [
            [
                'Hoàn tất' , $transactionSuccess, false
            ],
            [
                'Đang vận chuyển' , $transactionProcess, false
            ],
            [
                'Tiếp nhận' , $transactionDefault, false
            ],
            [
                'Huỷ bỏ' , $transactionCancel, false
            ]
        ];


  
        $viewData = [
            'totalTransactions'          => $totalTransactions,
            'totalUsers'                 => $totalUsers,
            'totalProducts'              => $totalProducts,
            'totalRatings'               => $totalRatings,

            'statusTransaction'          => json_encode($statusTransaction),
            
        ];

        return view('admin.statistical.index', $viewData);
       
    }
}
