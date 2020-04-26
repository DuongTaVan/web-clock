<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title>{{ strtolower($title_page ?? "Đồ án tốt nghiệp")   }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('ico.png') }}" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    @yield('css')

    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
      var TYPE_MESSAGE = "{{session('toastr.type')}}";
      var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
    <style type="text/css">
       #headers {
            background: #2196f3 !important;
           
        }
        #headers .search form {
            background: #fbfbfb !important;
            border: 1px solid #ffffff !important;
        }
        #headers .search form .btnSearch {
        background: #2196f3 !important;
        border-left: 1px solid #2196f3 !important;
       }
       #menu-main .menu-left .title {
        background: #4ca8f1 !important;
        }
        #menu-main .menu-right .right a:last-child {
        background: #4da4e8 !important;}
        #footer {
        background-image: linear-gradient(#232f3e,#384351) !important;}
        #bottom {
        background: #17232d !important;
        }
        #headers .search form{
          margin-left: 15px !important;
        }
    </style>
</head>
<body>
@include('frontend/components.header')
<div class="container user">
    <div class="left">
        <div class="header">

            <img src="{{ asset(Auth::user()->avatar) }}" alt="">
            <p>
                <span>Tài khoản của</span>
                <span>{{Auth::user()->name}}</span>
            </p>
        </div>
        <p>Đăng nhập lần cuối <b>{{ get_time_login(Auth::user()->log_login)['time'] ?? "" }}</b></p>
        <div class="content">
            <ul class="left-nav">
              @if(isset($snvfy)))
                @foreach(config('user') as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" class="{{ \Request::route()->getName() == $item['route'] ? 'active' : '' }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                        </a>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>
        <div class="collapse navbar-collapse flex-column" id="navbar-collapse">
                    <ul class="navbar-nav d-lg-block">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('frontend.account.dashboard')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('frontend.account.edit')}}">Cập nhật thông tin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('frontend.account.transaction')}}">Quản lý đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('frontend.account.favorite')}}">Sản phẩm yêu thích</a>
                        </li>

                    </ul>
                    <hr>
                </div>

    </div>
    <div class="right">
        @yield('content')
    </div>
    <div class="" style="clear: both"></div>
</div>
@include('frontend.components.footer')
<script>
  var DEVICE = '{{  device_agent() }}'
</script>

<script src="{{ asset('js/cart.js') }}" type="text/javascript"></script>

@yield('script')
</body>
</html>
