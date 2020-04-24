<div id="footer">
    <div class="container footer">
        <div class="footer__left">
            <div class="top">
                @for($i = 0; $i < 3; $i++)
                
                    <div class="item">
                        <div class="title">THÔNG TIN CHUNG</div>
                        <ul>
                            @foreach($menus as $menu)
                            <li>
                                <a href="{{route('frontend.blog.index')}}" title="{{$menu->mn_slug}}">{{$menu->mn_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                
                @endfor
            </div>
            
            <div class="bot">
                <div class="social">
                    <div class="title">KẾT NỐI VỚI CHÚNG TÔI</div>
                    <ul>
                        <li>
                        <a href="https://www.facebook.com/dth999/" title=""><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/dth999/" title=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UC03-WUILrQWC7j1a4o9Dg9g?view_as=subscriber" title=""><i class="fab fa-youtube"></i></a>
                        </li>
                        <li><a href="https://www.facebook.com/dth999/" title=""><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.facebook.com/dth999/" title=""><i class="fab fa-google-plus-g"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer__mid">
            <div class="title">Hệ thống cửa hàng</div>
            <div class="image">
                <a href="https://www.facebook.com/dth999/" title="Hệ thống cửa hàng" class="image cover">
                    <img data-src="" class="lazyload" alt="Dang Quang Watch" src="{{ url('images/event/cua-hang-dang-quang.jpg') }}" />
                </a>
                <p class="search-location">Tìm ngay cửa hàng gần bạn</p>
            </div>
            <a href="https://www.facebook.com/dth999/" title="" class="more">Xem tất cả hệ thống cửa hàng</a>
        </div>
        <div class="footer__right">
            <div class="title">Fanpage của chúng tôi</div>
            <div class="image">
            </div>
        </div>
    </div>
</div>
<div id="bottom">
    <div class="wrapper">
        <a href="{{route('frontend.home.index')}}" title="" class="logo">
            <img data-src="" class="lazyload" alt="Dang Quang Watch" src="{{ url('view/Css/icon/Logo.png') }}" />
        </a>
        <div class="right">
            <a href="#" title="" class="title">CÔNG TY CỔ PHẦN TRỰC TUYẾN ĐĂNG QUANG</a>
            <div class="lh24 tac">
                <p>
                    VPGD: Số 55 Trần Đăng Ninh – Cầu Giấy – TP. Hà Nội - Email: sieuthidangquang@gmail.com
                </p>
                <p>Giấy CNĐKKD và MSDN số: 0104938104 đăng ký lần đầu do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 07/10/2010</p>
            </div>
        </div>
    </div>
</div>
