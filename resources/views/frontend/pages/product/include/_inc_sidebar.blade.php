<div class="filter-sidebar">
  
        <div class="item">
            <div class="item__title">Thương hiệu</div>
            <div class="item__content">
                <ul>
                    <li>
                        <label>
                            <input type="checkbox" value="594">
                            <h2><span>Đồng hồ Philippe Auguste</span></h2>
                        </label>
                    </li>

                    <li>
                        <label>
                            <input type="checkbox" value="563">
                            <h2><span>Đồng hồ Epos Swiss</span></h2>
                        </label>
                    </li>
                   
                    

                </ul>
            </div>
       

        </div>
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