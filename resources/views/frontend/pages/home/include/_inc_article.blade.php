<section id="box-news">
    <div class="top"> <a href="#" class="main-title">Tin tức - Sự kiện</a> </div>
    <div class="bot">
        @foreach($articlesHot as $item)
        <div class="col">
            <div class="item">
                <div class="item__image">
                    <a href="{{route('frontend.blog_detail.index',$item->a_slug.'-'.$item->id)}}" title="{{ $item->a_name }}">
                        <img class="lazyload lazy" src="{{  asset('images/preloader.gif') }}" data-src="{{ pare_url_file($item->a_avatar) }}" alt="{{ $item->a_name }}"> 
                    </a>
                    </div>
                <div class="item__content">
                    <div class="date-time"> <i class="fa fa-calendar"></i> <span>{{ $item->created_at }}</span> </div>
                    <h3> <a href="{{route('frontend.blog_detail.index',$item->a_slug.'-'.$item->id)}}" class="title" title="{{ $item->a_name }}">{{ $item->a_name }}</a> </h3>
                    <p class="description"> {{ $item->a_content }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
