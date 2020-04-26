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
        #headers .search form input[type=text] {
          color: #171616 !important;}
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
<script type="text/javascript">
    /* lazyload.js (c) Lorenzo Giuliani
 * MIT License (http://www.opensource.org/licenses/mit-license.html)
 *
 * expects a list of:  
 * `<img src="blank.gif" data-src="my_image.png" width="600" height="400" class="lazy">`
 */

!function(window){
  var $q = function(q, res){
        if (document.querySelectorAll) {
          res = document.querySelectorAll(q);
        } else {
          var d=document
            , a=d.styleSheets[0] || d.createStyleSheet();
          a.addRule(q,'f:b');
          for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)
            l[b].currentStyle.f && c.push(l[b]);

          a.removeRule(0);
          res = c;
        }
        return res;
      }
    , addEventListener = function(evt, fn){
        window.addEventListener
          ? this.addEventListener(evt, fn, false)
          : (window.attachEvent)
            ? this.attachEvent('on' + evt, fn)
            : this['on' + evt] = fn;
      }
    , _has = function(obj, key) {
        return Object.prototype.hasOwnProperty.call(obj, key);
      }
    ;

  function loadImage (el, fn) {
    var img = new Image()
      , src = el.getAttribute('data-src');
    img.onload = function() {
      if (!! el.parent)
        el.parent.replaceChild(img, el)
      else
        el.src = src;

      fn? fn() : null;
    }
    img.src = src;
  }

  function elementInViewport(el) {
    var rect = el.getBoundingClientRect()

    return (
       rect.top    >= 0
    && rect.left   >= 0
    && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
    )
  }

    var images = new Array()
      , query = $q('img.lazy')
      , processScroll = function(){
          for (var i = 0; i < images.length; i++) {
            if (elementInViewport(images[i])) {
              loadImage(images[i], function () {
                images.splice(i, i);
              });
            }
          };
        }
      ;
    // Array.prototype.slice.call is not callable under our lovely IE8 
    for (var i = 0; i < query.length; i++) {
      images.push(query[i]);
    };

    processScroll();
    addEventListener('scroll',processScroll);

}(this);
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#demo_image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $("#uploadfile").change(function () {
        readURL(this);
    });
</script>
    @jquery
    @toastr_js
    @toastr_render
</body>
</html>