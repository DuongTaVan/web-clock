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
         @foreach($attributes as $key => $attribute)

                <div class="item">
                <div class="item__title">{{$key}}</div>
                <div class="item__content">
                    <ul>
                        @foreach($attribute as $item)
                       
                        <li>
                            <label>
                            <a href="{{request()->fullUrlWithQuery(['attr'.$item['id']=>$item['id']])}}"><h2><span>{{$item['atb_name']}}</span></h2></a>
                                
                            </label>
                        </li>
                        @endforeach
                        
                       
                        

                    </ul>
                </div>
               

                </div>
         @endforeach
   
</div>