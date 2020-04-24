<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    @if(isset($meta_seo))
        {!! $meta_seo ? $meta_seo->renderMetaSeo() : '' !!}
    @else
        <link rel="shortcut icon" type="image/png" href="https://123job.vn/favicon.png">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
        <title>{{ $title_page ?? "Đồ án tốt nghiệp"   }}</title>
        
    @endif
     <link rel="stylesheet" type="text/css" href="https://codeseven.github.io/toastr/build/toastr.min.css">
     <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
     <style type="text/css">
        .rating i.active{
            color: #faca51;
        }
        .rating i.no_active{
            color: #e8e8e8;
        }
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
        #footer .footer__left .bot .social ul li a:hover{color: #fff !important;}
    </style>
    
    @toastr_css
         
    @yield('css')
    {{-- Thông báo --}}
    @if(session('toastr'))
        <script>
            var TYPE_MESSAGE = "{{session('toastr.type')}}";
            var MESSAGE = "{{session('toastr.message')}}";
        </script>
    @endif
    @if (session('notify'))
        <script>
            var TITLE_MESSAGE = "{{ session('notify.title') }}";
            var TYPE_MESSAGE = "{{ session('notify.type') }}";
            var TEXT_MESSAGE = "{{ session('notify.text') }}";
        </script>
    @endif
</head>
<body>
@include('frontend/components.header')
@yield('content')
@include('frontend/components.footer')
@yield('script')


<script>
    var DEVICE = '{{ device_agent() }}';
</script>
<script type="text/javascript">
    
    $('.js-show-login').click(function(){
        console.log('a');
        event.preventDefault();
        toastr.warning('Bạn phải đăng nhập để thực hiện tính năng này');
        return false;
    })
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>