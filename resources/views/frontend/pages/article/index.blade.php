@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/blog.min.css') }}">
@stop
@section('content')
    <div class="container">
        @include('frontend.components.breadcrumb')
        <div class="blog-main">
            <div class="left">
                <div class="post-hot">
                    <div class="hot-left">
                        <div class="avatar">
                            <a href="" title="" class="image cover">
                                <img data-src="" class="lazyload" alt="" src="{{pare_url_file($articles_one->a_avatar)}}">
                            </a>
                        </div>
                        <a href="" title="" class="title">{{$articles_one->a_name}}</a>
                        <p class="intro-short">
                            {!!$articles_one->a_description!!}
                        </p>
                    </div>
                    <div class="hot-right">
                        <div class="top">
                            <div class="avatar">
                                <a href="" title="" class="image cover">
                                    <img data-src="" class="lazyload" alt="" src="{{pare_url_file($articles_one->a_avatar)}}">
                                </a>
                            </div>
                            
                        </div>
                        <div class="bot">
                            @foreach($articleTop as $item)
                            <a href="{{route('frontend.blog_detail.index',$item->a_slug.'-'.$item->id)}}" title="{{$item->a_name}}" class="">{{$item->a_name}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="post-list">
                    @foreach($articles as $article)
                        @include('frontend.pages.article.include._inc_blog_item',['article'=>$article])
                    @endforeach
                </div>
            </div>
            <div class="right">
                <div class="top-question">
                    <div class="title">Hỏi đáp về đồng hồ</div>
                    <ul>
                        @foreach($articleHotSidebarTop as $key=> $item)
                        <li>
                            <span class="stt">{{++$key}}</span><a href="{{route('frontend.blog_detail.index',$item->a_slug.'-'.$item->id)}}">{{$item->a_name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @include('frontend.components.top_product',['top_producs'=>$top_produc_pays])
                @include('frontend.components.top_article',['products'=>$top_articles])
            </div>
        </div>
    </div>
@stop
@section('script')
  
@stop