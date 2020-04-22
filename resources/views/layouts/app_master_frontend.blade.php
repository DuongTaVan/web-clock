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
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
<script>
    var DEVICE = '{{ device_agent() }}';
</script>
<script type="text/javascript">
    if(typeof TYPE_MESSAGE != "undefined"){
        switch (TYPE_MESSAGE){
            case 'success':
                toastr.success(MESSAGE)
                break;
            case 'error':
            toastr.error(MESSAGE)
            break;
        }
    }
    $('.js-show-login').click(function(){
        console.log('a');
        event.preventDefault();
        toastr.warning('Bạn phải đăng nhập để thực hiện tính năng này');
        return false;
    })
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>

</body>
</html>