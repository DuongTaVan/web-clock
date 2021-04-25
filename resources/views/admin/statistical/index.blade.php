@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Trang quản trị hệ thống website xây dựng website bán đồng hồ</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        <span class="info-box-number">{{$totalTransactions}}<small><a href="{{route('admin.transaction.index')}}">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number">{{$totalUsers}} <small><a href="{{route('admin.user.index')}}">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sản phẩm</span>
                        <span class="info-box-number">{{$totalProducts}}  <small><a href="{{route('admin.warehouse.index')}}">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-google-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đánh giá</span>
                        <span class="info-box-number">{{$totalRatings}} <small><a href="{{route('admin.rating.index')}}">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row" style="margin-bottom: 15px;">
        <div class="col-sm-8">
            <figure class="highcharts-figure">
            <div id="container2" data-list-day="{{ $listDay }}" data-money-default={{ $arrRevenueTransactionMonthDefault }} data-money={{ $arrRevenueTransactionMonth }}>         
            </div>
            </figure>
        </div>
        <div class="col-sm-4">
            <figure class="highcharts-figure">
                <div id="container" data-json="{{ $statusTransaction }}"></div>
            </figure>
        </div>
    </div>
    
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách đơn hàng bán chạy</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mặt hàng</th>
                                    <th>Hình ảnh</th>
                                    <th>Danh mục</th>
                                    <th>Đã mua</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product_pays as $product_pay)
                                <tr>

                                    <td>{{$product_pay->id}}</a></td>
                                    <td>{{$product_pay->pro_name}}</td>
                                    <td><img width="40px" height="50px" src="{{pare_url_file($product_pay->pro_avatar)}}"></td>
                                    <td><span class="label label-danger  ">{{$product_pay->cate->c_name??"[N/A]"}}</span></td>
                                    <td>
                                        {{$product_pay->pro_pay}}
                                    </td>
                                </tr>
                                @endforeach

                                
                                
                            </tbody>

                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="{{route('admin.product.index')}}" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="{{route('admin.product.index')}}" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Sản phẩm mới</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        @foreach($product_news as $product_new)
                        <li class="item">
                            <div class="product-img">
                                <img src="{{pare_url_file($product_new->pro_avatar)}}" alt="Product Image">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">{{$product_new->pro_name}}
                                <span class="label label-warning pull-right">{{$product_new->pro_price}} vnd</span></a>
                                
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{route('admin.product.index')}}" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@stop
@section('script')

<link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
        let dataTransaction = $("#container").attr('data-json');
        dataTransaction  =  JSON.parse(dataTransaction);
        let listday = $("#container2").attr("data-list-day");
        listday = JSON.parse(listday);

        let listMoneyMonth = $("#container2").attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);
        
        let listMoneyMonthDefault = $("#container2").attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);
        Highcharts.chart('container', {

            chart: {
                styledMode: true
            },

            title: {
                text: 'Thống kê trạng thái đơn hàng'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data: dataTransaction,
                showInLegend: true
            }]
        });
        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Temperature'
                },
                labels: {
                    formatter: function () {
                        return this.value + '°';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [
            	{
                    name: 'Hoàn tất giao dịch',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonth
                },
                {
                    name: 'Tiếp nhận',
                    marker: {
                        symbol: 'square'
                    },
                    data: listMoneyMonthDefault
                }
            ]
        });


       
     
    </script>
@stop