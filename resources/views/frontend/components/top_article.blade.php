<div class="blog-top">
    <div class="title">Bài viết nổi bật</div>
    
    <div class="bot">

        @foreach($products as $top_aticle)

            <div class="item">
                <a href="{{route('frontend.blog_detail.index',$top_aticle->a_slug.'-'.$top_aticle->id)}}" title="{{$top_aticle->a_name}}" class="image cover">
                    <img data-src="" class="lazyload" alt="{{$top_aticle->a_name}}" src="{{pare_url_file($top_aticle->a_avatar)}}"> 
                    <p>{{$top_aticle->a_name}}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>