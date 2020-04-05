@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog_detail.min.css') }}">
@stop
@section('content')
    <div class="container">
        @include('frontend.components.breadcrumb')
        <div class="blog-main">
            <div class="left">
                <div class="post-detail">
                    <h1 class="post-detail__title">{{$article_detail->a_name}}</h1>
                    <p class="post-detail__intro">{{$article_detail->a_description}}</p>
                    <div class="post-detail__content">
                        @include('frontend.pages.article_detail.include._inc_content')
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top-question">
                    <div class="title">Hỏi đáp về đồng hồ</div>
                    <ul>
                        <li>
                            <span class="stt">1</span><a href="#">Hỏi đáp về đồng hồ: Mặt kính đồng hồ đeo tay có bao nhiêu loại?</a>
                        </li>
                        <li>
                            <span class="stt">2</span><a href="#">Dược lựa chọn nhiều nhất tại Đăng Quang Watch</a>
                        </li>
                        <li>
                            <span class="stt">3</span><a href="#">Hỏi đáp về đồng hồ: Mặt kính đồng hồ đeo tay có bao nhiêu loại?</a>
                        </li>
                        <li>
                            <span class="stt">4</span><a href="#">Dược lựa chọn nhiều nhất tại Đăng Quang Watch</a>
                        </li>
                    </ul>
                </div>
                <div class="best-sell">
                    <div class="title">Top bán chạy nhất</div>
                    <div class="content">
                        @for($i = 0; $i < 5; $i++)
                            <div class="item">
                                <div class="item__avatar">
                                    <a href="" title="" class="image cover">
                                        <img data-src="" class="lazyload" alt="Đồng hồ Diamond D" src="{{ url('images/banner/dongho.jpg') }}">
                                    </a>
                                </div>
                                <div class="item__info">
                                    <a href="#" title="Đồng hồ Diamond D" class="cate">Đồng hồ Diamond D</a>
                                    <a href="" title="SaleOff" class="cate sale">-10%</a>
                                    <a href="" title="Đồng hồ Diamond D DD6014B" class="name">Đồng hồ Diamond D DD6014B</a>
                                    <p class="price">
                                        <span>Giá bán: </span>
                                        <span class="new">6.363.900 đ</span>
                                    </p>
                                    <p class="price">
                                        <span>Giá gốc: </span>
                                        <span class="old">7.071.000 đ</span>
                                    </p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="blog-top">
                    <div class="title">Top bán chạy nhất</div>
                    <div class="top">
                        <div class="top__avatar">
                            <a href="" title="" class="image cover">
                                <img data-src="" class="lazyload" alt="" src="{{ url('images/banner/dongho.jpg') }}">
                            </a>
                        </div>
                        <a href="" title="" class="top__title">DDây là tiêu đề bài viết</a>
                    </div>
                    <div class="bot">
                        @for($i = 0; $i < 4; $i++)
                            <div class="item">
                                <a href="" title="" class="image cover">
                                    <img data-src="" class="lazyload" alt="" src="{{ url('images/banner/dongho.jpg') }}">
                                    <p>BLACK FRIDAY 2019 - Giảm giá lớn lên tới 30% toàn bộ sản phẩm</p>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ mix('js/blog_detail.js') }}" type="text/javascript"></script>
@stop