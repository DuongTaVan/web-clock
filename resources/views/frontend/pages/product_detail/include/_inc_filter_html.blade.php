<div class="filter">
    <div class="fil">Lọc theo :</div>
    <div>
        <ul>
            <li><a href="{{route('frontend.detail.rating',$product->pro_slug.'-'.$product->id)}}" class="active">Tất cả</a></li>
            @for ($i = 5 ; $i >= 1 ; $i --)
                <li><a href="{{request()->fullUrlWithQuery(['s'=>$i])}}" >{{ $i }} sao</a></li>
            @endfor
        </ul>
    </div>
</div>
<div style="clear: both;"></div>