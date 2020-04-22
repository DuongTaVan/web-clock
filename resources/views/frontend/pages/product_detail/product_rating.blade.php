@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/product_detail.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/review.css') }}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
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
 
</style>
@stop
@section('content')
    <div class="container">
        
        @include('frontend/components/breadcrumb')

        <div class="card">
            <div class="card-body info-detail">
               
            </div>
            @include('frontend.pages.product_detail.include._inc_ratings')
           <div class="reviews_list">
            @include('frontend.pages.product_detail.include._inc_list_reviews')
            </div>
                <!-- <div class="comments">
                    <div class="form-comment">
                        <form action="" method="POST">
                            <input type="hidden" name="productId" value="{{ $product->id }}">
                            <div class="form-group">
                                <textarea placeholder="Mời bạn để lại bình luận ..." name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                            <div class="footer">
                                <p>
                                    <a href=""><i class="la la-camera"></i> Gửi ảnh</a>
                                    <a href="">Quy định đăng bình luận</a>
                                </p>
                                <button class=" {{ \Auth::id() ? 'js-save-comment' : 'js-show-login' }}">Gửi bình luận</button>
                            </div>
                        </form>
                    </div>
                
                </div> -->
           
        </div>
    </div>
@stop
@section('script')
    <script src="{{ mix('js/product_detail.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(function(){
        

   

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
                alert(results.messages);
            });
        })
        $('body').on('click','.pagination a', function(e) {
             e.preventDefault();
             var URL = $(this).attr('href');
             //console.log(page);
             getListRatings(URL);
       });
      
       function getListRatings(URL)
       {
            $.ajax({
                 type: "GET",
                 url: URL
            })
            .success(function(results) {

                $('.reviews_list').html(results.html);
                //console.log(results.html);
            });
       }
    });
    </script>
@stop