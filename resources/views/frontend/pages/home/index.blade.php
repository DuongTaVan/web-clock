@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home.min.css') }}">
    <style type="text/css">
            .rating i.active{
                color: #faca51;
            }
            .rating i.no_active{
                color: #e8e8e8;
            }
           
            
        </style>
@stop
@section('content')
    @include('frontend/components.slider')
    <div class="container">
        <div class="logo-partner">
            @foreach($trademarks as $trademark)
                <div class="item">
                    <a href="" title="{{$trademark->trm_name}}">
                        <img class="lazyload" src="{{asset($trademark->image)}}" data-src="" alt="Atlantic Swiss" />
                    </a>
                </div>
            @endforeach
        </div>
        <div class="product-one">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM NỔI BẬT</a>
                <ul class="top__tab">
                    <li data-id="proNewst1" class="active"><a href="javascript://" title="">Tất cả</a></li>
                    <li data-id="proNewst2"><a href="javascript://" title=""><h2>Đồng hồ nam</h2></a></li>
                    <li data-id="proNewst3"><a href="javascript://" title=""><h2>Đồng hồ nữ</h2></a></li>
                </ul>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @foreach($product_hot as $pr)
                        <div class="item">
                            @include('frontend/components.product_item',['pr'=>$pr])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('frontend.pages.home.include._inc_flash_sale')

        

        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">ĐỒNG HỒ DIAMOND D</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right">
                    @if(isset($diamonds->product))
                    @foreach($diamonds->product as $item)
                        <div class="item">
                            @include('frontend/components.product_item',['pr'=>$item])
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">ĐỒNG HỒ PHILIPPE AUGUSTE</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <a href="#" title="" class="" target="_blank">
                            <img class="lazyload" alt="" src="https://www.dangquangwatch.vn/upload/homeads/686416914_dong-ho-nhap-khau102.jpg" />
                        </a>
                    </div>
                </div>
                <div class="right">
                    @foreach($philippes->product as $item)
                        <div class="item">
                            @include('frontend/components.product_item',['pr'=>$item])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">ĐỒNG HỒ ATLANTIC SWISS</a>
            </div>
            <div class="bot">
                @if(isset($diamonds->product))
                @foreach($diamonds->product as $item)
                    <div class="item">
                        @include('frontend/components.product_item',['pr'=>$item])
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <div class="product-five">
            <div class="top">
                <a href="#" class="main-title">BÚT KÍ CAO CẤP</a>
            </div>
            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                @if(isset($pens->product))
                @foreach($pens->product as $item)
                    <div class="item">
                        @include('frontend/components.product_item',['pr'=>$item])
                    </div>
                @endforeach
                @endif
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">KÍNH MẮT THỜI TRANG</a>
            </div>
            <div class="bot">
                @if(isset($glasses->product))
                @foreach($glasses->product as $item)
                    <div class="item">
                        @include('frontend/components.product_item',['pr'=>$item])
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ mix('js/home.js') }}" type="text/javascript"></script>
@stop