<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\{Product, Transactions, Rating};
use App\User;
use App\HelpersClass\Date;

class AdminStatisticalController extends Controller
{
    public function index(){
    	$totalProducts = Product::count();
    	$totalTransactions = Transactions::count();
    	$totalRatings = Rating::count();
    	$totalUsers = User::count();
        $product_pays = Product::with('cate')->orderByDesc('pro_pay')->paginate(5);
        $product_news = Product::orderByDesc('id')->limit(5)->get();
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
        $listDay = Date::getListDayInMonth();

        //Doanh thu theo tháng ứng với trạng thái đã xử lý
        $revenueTransactionMonth = Transactions::where('tst_status',3)
            ->whereMonth('created_at',date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        //Doanh thu theo tháng ứng với trạng thái tiếp nhận
        $revenueTransactionMonthDefault = Transactions::where('tst_status',1)
            ->whereMonth('created_at',date('m'))
            ->select(\DB::raw('sum(tst_total_money) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();

        $arrRevenueTransactionMonth = [];
        $arrRevenueTransactionMonthDefault = [];
        foreach($listDay as $day) {
            $total = 0;
            foreach ($revenueTransactionMonth as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }

            $arrRevenueTransactionMonth[] = (int)$total;

            $total = 0;
            foreach ($revenueTransactionMonthDefault as $key => $revenue) {
                if ($revenue['day'] ==  $day) {
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrRevenueTransactionMonthDefault[] = (int)$total;
        }



        $viewData = [
            'totalTransactions'          => $totalTransactions,
            'totalUsers'                 => $totalUsers,
            'totalProducts'              => $totalProducts,
            'totalRatings'               => $totalRatings,
            'statusTransaction'          => json_encode($statusTransaction),
            'listDay'                    => json_encode($listDay),
            'arrRevenueTransactionMonth' => json_encode($arrRevenueTransactionMonth),
            'arrRevenueTransactionMonthDefault' => json_encode($arrRevenueTransactionMonthDefault),
            'product_pays'               => $product_pays,
            'product_news'               => $product_news
            
        ];
        return view('admin.statistical.index', $viewData);
       
    }
}
