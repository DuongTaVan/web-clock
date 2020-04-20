<div class="commonTop">
    <div id="headers">
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="{{route('frontend.home.index')}}" class="desktop">
                    <img src="{{ url('images/icon/Logo.png') }}" alt="Home">
                </a>
                <a href="/" class="mobile">
                    <img src="{{ url('images/icon/LogoMobile.png') }}" alt="Home">
                </a>
            </div>
            <div class="search">
                <form action="" role="search" method="post">
                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm ...">
                    <button type="submit" class="btnSearch">
                        <i class="fa fa-search"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
                <ul class="right">
                    <li>
                        <a href="{{route('frontend.shopping.index')}}" title="Giỏ hàng">
                            <i class="icon icon-cart"></i>
                            <span class="text">
                                <span class="">Giỏ hàng ({{Cart::count()}})</span>
                                <span></span>
	                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:18006005" title="">
                            <i class="icon icon-phone"></i>
                            <span class="text">
                                <span class="">Hotline</span>
                                <span>1800.6005</span>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Hệ thống cửa hàng">
                            <i class="icon icon-showroom"></i>
                            <span class="text">
                                <span>Hệ thống cửa hàng</span>
                                <span>(100) showroom</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <a href="javascript://" class="open-sidebar js-open-bar">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </a>
        </div>
    </div>
    <div id="menu-main">
        <div class="container menu-wrapper">
            <div class="menu-left">
                <a href="javascript://" title="" class="title">
                    <i class="fa fa-bars"></i> Danh mục sản phẩm
                </a>
                <ul id="menu">
                    @foreach($category as $cate)
                    <li>
                        <a href="{{route('frontend.product.index')}}" title="{{$cate->c_name}}">
                            {{$cate->c_name }}
                            <span class="openSub">
                                <i class="icon icon-submenu"></i>
                            </span>
                        </a>
                        
                    </li>
                    @endforeach
                   
                </ul>
            </div>
            <div class="menu-right">
                <div class="left">
                    <ul>
                        @foreach($category as $cate)
                        <li>
                            <a href="" title="{{$cate->c_name}}">
									<span class="name">
										{{$cate->c_name}}
									</span>
                                
                            </a>
                        </li>
                        @endforeach
                        @if(!isset(Auth::user()->name))
                        <li>
                            <a href="{{route('frontend.account.login.index')}}" title="Dangnhap">

                                    <span class="name">
                                        ĐĂNG NHẬP
                                    </span>  
                            </a>
                        </li>
                        <li>
                            <a href="{{route('frontend.account.register.index')}}" title="Dangki">
                                    <span class="name">
                                        ĐĂNG KÍ
                                    </span>
                                
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="" title="Dangnhap">

                                    <span class="name">
                                        {{Auth::user()->name}}
                                    </span>  
                            </a>
                        </li>
                        <li>
                            <a href="{{route('frontend.account.logout.index')}}" title="Dangki">
                                    <span class="name">
                                        ĐĂNG XUẤT
                                    </span>
                                
                            </a>
                        </li>
                        @endif

                    </ul>
                </div>
                <div class="right">
                    <a href="/tin-tuc/561/Mua-hang-tra-gop-lai-suat-0-Rinh-ngay-dong-ho-hieu.html" title="Trả góp">
                        <span class="text">Trả góp 0%</span>
                        <i class="icon icon-installment"></i>
                    </a>
                    <a href="{{route('frontend.blog.index')}}" title="Tin tức - Sự kiện">
                        <i class="icon icon-news"></i>
                        <span class="text">Tin tức</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>