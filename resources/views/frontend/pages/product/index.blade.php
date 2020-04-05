@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_search.min.css') }}">
    <style type="text/css">
        .pagination{
            margin: 10px auto;
            display: flex;
            margin-left: 9px;
        }
        .pagination li{
            padding: 5px;
            margin: 0 2px;
            border: 1px solid #dedede;
        }
        .pagination li a, .pagination li span{
            line-height: 25px;
            display: block;
            text-align: center;
            width: 25px;
            height: 25px;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="product-list">
            <div class="left">
                @include('frontend.pages.product.include._inc_sidebar')
            </div>
            <div class="right">
                @include('frontend.components.breadcrumb')
                <div class="filter-tab">
                    <ul>
                        @for($i =1; $i <= 5; $i++)
                            <li>
                                <label>
                                    <a href="{{request()->fullUrlWithQuery(['price'=>$i])}}">Giá &lt; {{$i*2}} triệu</a>
                                   
                                </label>
                            </li>
                        @endfor
                        <a href="{{request()->fullUrlWithQuery(['price'=>6])}}">Giá > 10 triệu</a>
                    </ul>
                </div>
                <div class="order-tab">
                    <span class="total-prod">Tổng số: {{$product->total()}} sản phẩm Tính năng</span>
                    <div class="sort">
                        <div class="item">
                            <span class="title">Sắp xếp <i class="fa fa-caret-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="group">
                    @foreach($product as $pr)
                        @include('frontend.components.product_item',['pr'=>$pr])
                    @endforeach
                </div>
                <div style="clear: both;">{!!$product->appends([])->links()!!}</div>
            </div>

        </div>

    </div>

@stop
@section('script')
    <script src="{{ mix('js/product_search.js') }}" type="text/javascript"></script>
@stop