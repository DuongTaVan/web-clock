<div class="best-sell">
                    <div class="title">Top bán chạy nhất</div>
                    <div class="content">
                        @foreach($top_producs as $top_prp)
                            <div class="item">
                                <div class="item__avatar">
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="" class="image cover">
                                        <img data-src="" class="lazyload" alt="Đồng hồ Diamond D" src="{{pare_url_file($top_prp->pro_avatar)}}">
                                    </a>
                                </div>
                                <div class="item__info">
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="Đồng hồ Diamond D" class="cate">{{$top_prp->cate->c_name??"N/A"}}</a>
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="SaleOff" class="cate sale">{{$top_prp->pro_sale}}%</a>
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="Đồng hồ Diamond D" class="cate">{{$top_prp->pro_name}}</a>
                                    
                                    <a href="{{route('frontend.detail.index',$top_prp->pro_slug.'-'.$top_prp->id)}}" title="" class="name">{{$top_prp->pro_desciption}}</a>
                                    <p class="price">
                                        <span>Giá bán: </span>
                                        <span class="new">{{number_format(($top_prp->pro_price)-($top_prp->pro_price)*($top_prp->pro_sale)/100,0,",",".")}} đ</span>
                                    </p>
                                    <p class="price">
                                        <span>Giá gốc: </span>
                                        <span class="old">{{number_format($top_prp->pro_price,0,",",".")}} đ</span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>