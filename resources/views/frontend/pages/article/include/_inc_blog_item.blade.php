<div class="blog-item">
    <div class="avatar">
        <a href="{{route('frontend.blog_detail.index',$article->a_slug.'-'.$article->id)}}" title="" class="image cover">
            <img data-src="" class="lazyload" alt="" src="{{pare_url_file($article->a_avatar)}}">
        </a>
    </div>
    <div class="info">
        <a href="{{route('frontend.blog_detail.index',$article->a_slug.'-'.$article->id)}}" title="{{$article->a_name}}">{{$article->a_name}}</a>
        <p>{{$article->a_content}} </p>
    </div>
</div>