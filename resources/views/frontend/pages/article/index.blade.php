@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog.min.css') }}">
@stop
@section('content')
    <div class="container">
        @include('frontend.components.breadcrumb')
        <div class="blog-main">
            <div class="left">
                <div class="post-hot">
                    <div class="hot-left">
                        <div class="avatar">
                            <a href="" title="" class="image cover">
                                <img data-src="" class="lazyload" alt="" src="{{ url('images/banner/dongho.jpg') }}">
                            </a>
                        </div>
                        <a href="" title="" class="title">DDây là tiêu đề bài viết</a>
                        <p class="intro-short">
                            Thật là đáng tiếc nếu như bạn quá bận rộn và trót bỏ lỡ bão sale Black Friday nhưng mọi chuyện sẽ không còn quá tệ nếu bạn biết sau Black Friday còn có Cyber Monday nữa.
                        </p>
                    </div>
                    <div class="hot-right">
                        <div class="top">
                            <div class="avatar">
                                <a href="" title="" class="image cover">
                                    <img data-src="" class="lazyload" alt="" src="{{ url('images/banner/dongho.jpg') }}">
                                </a>
                            </div>
                            <a href="" title="" class="title">DDây là tiêu đề bài viết</a>
                        </div>
                        <div class="bot">
                            <a href="" title="" class="">Những mẫu đồng hồ nam được lựa chọn nhiều nhất tại Đăng Quang Watch</a>
                            <a href="" title="" class="">Những mẫu đồng hồ nam đượ Watch</a>
                            <a href="" title="" class="">Dược lựa chọn nhiều nhất tại Đăng Quang Watch</a>
                            <a href="" title="" class="">Dược lựa chọn nhiều nhất tại Đăng Quang Watch tại Đăng Quang Watc</a>
                        </div>
                    </div>
                </div>
                <div class="post-list">
                    @foreach($articles as $article)
                        @include('frontend.pages.article.include._inc_blog_item',['article'=>$article])
                    @endforeach
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
                        @foreach($top_produc_pays as $top_prp)
                            <div class="item">
                                <div class="item__avatar">
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="" class="image cover">
                                        <img data-src="" class="lazyload" alt="Đồng hồ Diamond D" src="{{pare_url_file($top_prp->pro_avatar)}}">
                                    </a>
                                </div>
                                <div class="item__info">
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="Đồng hồ Diamond D" class="cate">{{$top_prp->cate->c_name??"N/A"}}</a>
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="SaleOff" class="cate sale">{{$top_prp->pro_sale}}%</a>
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="Đồng hồ Diamond D" class="cate">{{$top_prp->pro_name}}</a>
                                    
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="" class="name">{{$top_prp->pro_desciption}}</a>
                                    <p class="price">
                                        <span>Giá bán: </span>
                                        <span class="new">{{number_format(($top_prp->pro_price)-($top_prp->pro_price)*($top_prp->pro_sale)/100,0,",",".")}} đ</span>
                                    </p>
                                    <p class="price">
                                        <span>Giá gốc: </span>
                                        <span class="old">{{number_format($top_prp->pro_price,0,",",".")}} đ</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
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
    <script src="{{ mix('js/blog.js') }}" type="text/javascript"></script>
@stop