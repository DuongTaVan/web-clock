@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_detail.min.css') }}">
@stop
@section('content')
    <div class="container">
        @include('frontend/components/breadcrumb')
        <div class="card">
            <div class="card-body info-detail">
                <div class="left">
                    <div class="slider-pro" id="my-slider">
                        <div class="sp-slides">
                            <!-- Slide 1 -->
                            <div class="sp-slide">
                                <img class="sp-image" src="{{ url('images/banner/dongho.jpg') }}" alt="">
                            </div>
                            <div class="sp-slide">
                                <img class="sp-image" src="{{ url('images/banner/dongho.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="sp-thumbnails">
                            <img class="sp-thumbnail" src="{{ url('images/banner/dongho.jpg') }}" />
                            <img class="sp-thumbnail" src="{{ url('images/banner/dongho.jpg') }}" />
                        </div>
                    </div>
                </div>
                <div class="right">
                    <h1>{{$product->pro_name}}</h1>
                    <div class="right__content">
                        <div class="info">
                            <div class="prices">
                                <p>Giá niêm yết: <span class="value">{{number_format($product->pro_price,0,",",".")}} đ</span></p>
                                <p>
                                    Giá bán: <span class="value price-new">{{number_format(($product->pro_price)-($product->pro_price)*($product->pro_sale)/100,0,",",".")}} đ</span>
                                    <span class="sale">-{{$product->pro_sale}}%</span>
                                </p>
                                <p>View:&nbsp<span>{{$product->pro_view}}</span></p>
                            </div>
                            <div class="btn-cart">
                                <a href="{{route('frontend.shopping.add',$product->id)}}" title="" onclick="add_cart_detail('17617',0);" class="muangay">
                                    <span>Mua ngay</span>
                                    <span>Hotline: 1800.6005</span>
                                </a>
                                <a href="#" title="" onclick="add_cart_detail('17617',1);" class="muatragop">
                                    <span>Mua trả góp 0%</span>
                                    <span>Visa, Master, JCB</span>
                                </a>
                            </div>
                            <div class="infomation">
                                <h2 class="infomation__title">Thông số kỹ thuật</h2>
                                <div class="infomation__group">

                                    <div class="item">
                                        <p class="text1">Xuất xứ:</p>
                                        <h3 class="text2">{{$product->country($product->pro_country)}}</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Kiểu dáng:</p>
                                        <h2 class="text2">
                                            @if (isset($product->cate->c_name))
                                              <a href="{{route('frontend.product.index',$product->cate->c_slug).'-'.$product->pro_category_id}}">{{$product->cate->c_name}}</a>
                                            @else
                                              "[N/A]"
                                            @endif
                                        </h2>

                                    </div>
                                    <div class="item">
                                        <p class="text1">Năng lượng:</p>
                                        <h3 class="text2">{{$product->  pro_energy}}</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Độ chịu nước:</p>
                                        <h3 class="text2">{{$product->  pro_resistant}}</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Chất liệu mặt:</p>
                                        <h3 class="text2">Sapphire</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Đường kính mặt:</p>
                                        <h3 class="text2">30 mm</h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Độ dầy:</p>
                                        <h3 class="text2"></h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Chất liệu dây:</p>
                                        <p class="text2">Stainless Steel</p>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Size dây:</p>
                                        <p class="text2"></p>
                                    </div>
                                   @if(isset($product->keywords))
                                    <div class="infomation" style="margin-top: 20px;">
                                        <h2 class="infomation__title">Keyword</h2>
                                        <div class="infomation__group">
                                            <div class="item">
                                                
                                                @foreach($product->keywords as $keyword)
                                                    <a href=""
                                                       style="border: 1px solid #E91E63;display: inline-block;font-size: 13px;padding: 0 5px;border-radius: 5px;margin-right: 10px;color: #E91E63;">{{ $keyword->k_name }}</a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="ads">
                            <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%" src="{{ url('images/banner/dongho.jpg') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body product-des">
                <div class="left">
                    <div class="tabs">
                        <div class="tabs__content">
                            <div class="product-five">
                                <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                    @foreach($products as $pr)
                                        <div class="item">
                                            @include('frontend/components/product_item',['pr'=>$pr])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%" src="{{ url('images/banner/dongho.jpg') }}"></a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ mix('js/product_detail.js') }}" type="text/javascript"></script>
@stop