<div class="product-item">
	@if(isset($pr))
    <a href="{{route('frontend.detail.index',$pr->id)}}"  class="avatar image contain">
        <img alt="" src="{{pare_url_file($pr->pro_avatar)}}" class="lazyload">
    </a>
    <a href="{{route('frontend.detail.index',$pr->id)}}" title="" >
        <h3>{{$pr->pro_name}}</h3>
        <p class="rating">
            <span>
                @php 
                    $iactive = 0;
                    if ($pr->pro_review_total){
                        $iactive = round($pr->pro_review_star / $pr->pro_review_total,2);     
                    }
                    
                @endphp
                @for($i = 1 ; $i <= 5 ; $i ++)
                    <i class="fa fa-star {{ $i <= $iactive ? 'active' : 'no_active'  }}"></i>
                @endfor
            </span>
            <span class="text"><a href="{{route('frontend.detail.rating', $pr->id)}}">{{ $pr->pro_review_total }} đánh giá </a></span>
        </p>
    </a>
    <p class="percent">{{$pr->pro_sale}}%</p>

    <p class="price-sale">{{number_format($pr->pro_price,0,",",".")}} đ</p>
    <p class="price">{{number_format(($pr->pro_price)-($pr->pro_price)*($pr->pro_sale)/100,0,",",".")}} đ</p>
  
    @endif
</div>