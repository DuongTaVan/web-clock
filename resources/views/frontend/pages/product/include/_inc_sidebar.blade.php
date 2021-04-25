
<div class="filter-sidebar">
  
 
        @if (isset($country))
        <div class="item">
            <div class="item__title">Xuất xứ</div>
            <div class="item__content">
                <ul>
                    @foreach($country as $key => $item)
                        <li class="{{ Request::get('country') == $key ? "active" : "" }} js-param-search" data-param="country={{ $key }}">
                            <a href="{{ request()->fullUrlWithQuery(['country'=> $key]) }}">
                                <span>{{ $item }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>