<div class="product-item">
	@if(isset($pr))
    <a href="san-pham/{{$pr->id}}"  class="avatar image contain">
        <img alt="" src="{{pare_url_file($pr->pro_avatar)}}" class="lazyload">
    </a>
    <a href="san-pham/san-pham-1" title="" >
        <h3>{{$pr->pro_name}}</h3>
    </a>
    <p class="percent">{{$pr->pro_sale}}%</p>
    @if($pr->pro_sale == 0)
    <p class="price">{{number_format($pr->pro_price,0,",",".")}} đ</p>
    @else
    <p class="price-sale">{{number_format($pr->pro_price,0,",",".")}} đ</p>
    <p class="price">{{number_format(($pr->pro_price)-($pr->pro_price)*($pr->pro_sale)/100,0,",",".")}} đ</p>
    @endif
    @endif
</div>