@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_detail.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="{{ asset('css/comments.css') }}">
    <style type="text/css">
            .item_review i.active{
                color: #faca51;
            }
            .item_review i.no_active{
                color: #eff0f5;
            }
            .item_success {
                color: #049802;
            }
            .item_footer{
                color: #8e8e8e;
            }
            .btn-load-rating{
                padding: 5px 20px;
                color: #288ad6;
                border:solid 1px #288ad6;
                border-radius: 3px;
                text-align: center;
                box-sizing: border-box;
                margin: 20px 0 20px;
            }
            .js-like-success{
                color:red !important ;
            }
            .pagination{
                margin: 10px auto;
                margin-left: 9px;
                display: flex;
            }
            .pagination li{
                padding: 5px;
                margin: 0 2px;
                border: 1px solid #dedede;
            }
            .pagination li a, .pagination li span{
                line-height: 25px;
                display: block;
                text-align: center;
                width: 25px;
                height: 25px;
            }
            .clear-both{
                clear: both;
            }

        </style>

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
                            @foreach($product_images as $product_image)
                            <div class="sp-slide">
                                <img class="sp-image" src="{{pare_url_file($product_image->pi_slug)}}" alt="">
                            </div>
                            @endforeach

                        </div>
                        <div class="sp-thumbnails">
                            @foreach($product_images as $product_image)
                            <img class="sp-thumbnail" src="{{pare_url_file($product_image->pi_slug)}}" />
                            @endforeach
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
                                <a href="{{route('ajax_get.user.add_favorite',$product->id)}}" title="Thêm sản phẩm yêu thích" class="muatragop {{ \Auth::id() ? 'js-add-favorite' : 'js-show-login' }}">
                                    <span>Sản phẩm</span>
                                    <span>Yêu thích</span>
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
                <div class="clear-both">
                </div>
            </div>
            <div class="description">
                <h4 class="reviews-title">Chế độ bảo hành</h4>
                <p>{!!$product->pro_description!!}</p>
                <br> <br>
                </div>
            @include('frontend.pages.product_detail.include._inc_ratings')
            <div class="review_list">
            @include('frontend.pages.product_detail.include._inc_list_reviews')
            </div>
                <div class="comments" style="margin-top: 20px">
                    <div class="form-comment">
                        <form action="{{route('get_ajax_comment')}}" method="POST" id="form-comments">
                            @csrf
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <div class="form-group">
                                <textarea placeholder="Mời bạn để lại bình luận ..." name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="footer">
                                <p>
                                    <a href=""><i class="la la-camera"></i> Gửi ảnh</a>
                                    <a href="">Quy định đăng bình luận</a>
                                </p>
                                <button class=" {{ \Auth::id() ? 'js-save-comment' : 'js-show-login' }}">Gửi bình luận</button>
                            </div>
                        </form>
                    </div>
                @include('frontend.pages.product_detail.include._inc_list_comment')
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
    <script type="text/javascript">
        <?php $js = file_get_contents('js/product_detail.js');echo $js;?>
    </script>
    <script type="text/javascript">

    $('.js-show-login').click(function(){
        console.log('a');
        event.preventDefault();
        toastr.warning('Bạn phải đăng nhập để thực hiện tính năng này');
        return false;
    })
    </script>
    <script type="text/javascript">
    $(function(){
        $(".js-add-favorite").click(function(event){
            event.preventDefault();
            let $this = $(this);
            let URL = $this.attr('href');
            //alert(URL);
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                method:"POST",
                url: URL,
            }).done(function(results){

                toastr.info(results.messages);
            });

        });



        $(".js-review").click(function (event){
            event.preventDefault();
            let $this = $(this);
            if($this.hasClass('js-check-login')){
                toarstr.warning('Đăng  nhập để thực hiện chức năng này');
                return false;
            }
            if($this.hasClass('active')){
                $this.text('Gửi đánh giá').addClass('btn-success').removeClass('btn-default active')}
            else{
                $this.text('Đóng lại').addClass('btn-default active').removeClass('btn-success')}
            $('#block-review').slideToggle();
        })
        // hover icon thay doi so sao danh gia
        let $item = $('#ratings i');
        let arrTextRating = {
            1 : "Không thích",
            2 : "Tạm được",
            3 : "Bình thường",
            4 : "Rất tốt",
            5 : "Tuyệt vời"
        }
       // alert(1);
        $item.mouseover(function(){
            let $this = $(this);
            let $i = $this.attr('data-i');

            $('#review_value').val($i);
            $item.removeClass('active');
            $item.each(function(key, value){
                if(key + 1 <= $i){
                    $(this).addClass('active')
                }
            })
            $('#reviews-text').text(arrTextRating[$i]);
        })

        $('.js-process-review').click(function(even){
            even.preventDefault();
            let URL = $(this).parents('form').attr('action');
            //alert(URL);
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                method:"POST",
                url: URL,
                data: $('#form-review').serialize(),
            }).done(function(results){
                 $('#form-review')[0].reset();
                 $( ".js-review" ).trigger( "click" );
                 //console.log(results.html);
                 if(results.html){
                    $('.review_list .item').last().remove();
                    $('.review_list').prepend(results.html);
                 }
                toastr.info(results.messages);
            });
        })
        $('.js-save-comment').click(function(even){
            even.preventDefault();
            //alert(2222);
            let $this = $(this);
            let URL = $(this).parents('form').attr('action');
            let comment = $this.parents('form').find("textarea").val();
            if (!comment.length) {
                //toast.warning('Nội dung comments không được để trống!');
                toastr.warning('Nội dung comments không được để trống!');
               // alert('Nội dung comments không được để trống!');
                return false;
            }
            //alert(URL);
            $.ajax({
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                method:"POST",
                url: URL,
                data: $('#form-comments').serialize(),
            }).done(function(results){
                $('#form-comments')[0].reset();
                toastr.info(results.messages);
                if(results.html){
                    $('#list-comment .item').last().remove();
                    $('#list-comment').prepend(results.html);
                 }
            });
        })
        let _this = this;
        //alert(_this);
        $("body").on("click",".js-show-form-reply", function (event) {
            event.preventDefault();
            //alert('1');
            let $this = $(this);
            $(".lists .form-comment").remove();
            let commentID = $this.attr('data-id');
            let productID = $this.attr('data-product');
            //let route = 'frontend/user/ajax_rep_comment';
            let name = $this.attr('data-name');
            let html = `<div class="form-comment">
                    <form action="{{route('get_ajax_rep_comment')}}" method="POST" id="rep_comment">
                    <input type="hidden" name="productId" value="${productID}">
                    <input type="hidden" name="commentId" value="${commentID}">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" id="" cols="30" rows="5">@${name}: </textarea>
                        </div>
                        <div class="footer">
                            <p>
                                <a href=""><i class="la la-camera"></i> Gửi ảnh</a>
                                <a href="">Quy định đăng bình luận</a>
                            </p>
                            <button class="js-reply-comment" data-reply="">Gửi bình luận</button>
                        </div>
                    </form>
                </div>`;
            let $item = $this.parentsUntil('.item');
            //alert($item);
            if ($this.parents('.comments-reply').length)
            {
                //console.log("list");
                // $this.parents('.comments-reply').css('border','1px solid red');
                //alert($item.parents('.comments-reply'));
                $item.parents('.comments-reply').after(html)

            }else {
                $item.append(html);
            }

            $('.js-reply-comment').click(function(even){
                even.preventDefault();
                let $this = $(this);
                let URL = $(this).parents('form').attr('action');
                //alert(URL);
                let comment = $this.parents('form').find("textarea").val();
                if (!comment.length) {

                    toastr.warning('Nội dung không được để trống!');

                    return false;
                }
                //let $item = $this.parentsUntil('.item');

                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                    method:"POST",
                    url: URL,
                    data: $('#rep_comment').serialize(),
                }).done(function(results){
                    $('#rep_comment')[0].reset();
                    $("#rep_comment").remove();
                    //$('#form-review')[0].reset();
                    //$( ".js-show-form-reply" ).trigger( "click" );
                    //alert(123);
                    // if(results.html){
                    //     //$('#list-comment .item').last().remove();
                    //     $('.item .comments-reply').prepend(results.html);
                    //  }
                    if ($this.parents('.comments-reply').length)
                        {
                            //console.log("list");
                            // $this.parents('.comments-reply').css('border','1px solid red');
                            //alert($item.parents('.comments-reply'));
                            $item.parents('.comments-reply').after(results.html)
                        }else {
                            $item.append(results.html);
                        };
                });

        })


        })
        $('.js-like').click(function(even){
            even.preventDefault();
            let $this = $(this);
            let commentID = $this.attr('data-id');
            //alert(commentID);
            let productID = $this.attr('data-product');
            let URL = $this.attr('href');
            let data = {commentID: commentID, productID: productID}
            //let $item = $this.parentsUntil('.item');
           $.ajax({

            headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            method:"POST",
            url: URL,
            data: data,
            })
            .done(function(results) {
                //alert(results.messages);
                console.log(results);
                $this.addClass('js-like-success');
              });

        })


    });

    </script>
@stop
